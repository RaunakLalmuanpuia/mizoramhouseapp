<?php

namespace App\Http\Controllers;
use App\Repositories\OnDutyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class OnDutyController extends Controller
{
    //
    private OnDutyRepository $repository;

    public function __construct(OnDutyRepository $applicationRepository)
    {
        $this->repository = $applicationRepository;
    }



    public function stepTwo(){
        $applications = $this->repository->getDraft();
//        dd($applications);
        $this->repository->updateType();
        return Inertia::render('Form/ONDUTY/StepTwo', [
            'application' => $applications
        ]);
    }
    public function stepThree(){
        $applications = $this->repository->getDraft();
        return Inertia::render('Form/ONDUTY/StepThree', [
            'application' => $applications
        ]);
    }
    public function verify(){

        $applications = $this->repository->getDraft();
        return Inertia::render('Form/ONDUTY/Verify', [
            'application' => $applications
        ]);
    }

    public function submission(){
        $applications = $this->repository->getDraft();
        return Inertia::render('Form/Submission',[
            'application' => $applications
        ]);
    }
    public function storeStepOne(Request $request){

        $application = $this->repository->storeStepOne();

        return redirect()->route('on-duty.step-two');
    }


    public function storeStepTwo(Request $request)
    {
        $validatedData = $request->validate([
            'applicant_name' => 'required|string',
            'gender' => 'required|string',
            'designation' => 'nullable|string',
            'department' => 'required|string',
            'contact' => 'required|string',
            'application_id' => 'nullable|exists:applications,id',

            'department_approval' => 'nullable|file|mimes:pdf,jpg,png|max:2048', // File validation

            'on_duty_details' => 'array',
            'on_duty_details.*.name' => 'required|string',
            'on_duty_details.*.gender' => 'required|string',
            'on_duty_details.*.designation' => 'nullable|string',
            'on_duty_details.*.department' => 'required|string',
            'on_duty_details.*.contact' => 'required|string',
            'on_duty_details.*.department_approval' => 'nullable|file|mimes:pdf,jpg,png|max:2048',

            'family_details' => 'array',
            'family_details.*.name' => 'required|string',
            'family_details.*.relation' => 'required|string',
        ]);

        // Store the department approval file with a unique name
        if ($request->hasFile('department_approval')) {
            $file = $request->file('department_approval');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $validatedData['department_approval'] = $file->storeAs('approvals', $filename);
        }

        // Store each on-duty detail file with a unique name
        if (!empty($request->on_duty_details)) {
            foreach ($request->on_duty_details as $index => $onDuty) {
                if (!empty($onDuty['department_approval']) && $request->hasFile("on_duty_details.{$index}.department_approval")) {
                    $file = $request->file("on_duty_details.{$index}.department_approval");
                    $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
                    $validatedData['on_duty_details'][$index]['department_approval'] = $file->storeAs('approvals', $filename);
                }
            }
        }

        // Call repository function to store data
        $application = $this->repository->storeStepTwo($validatedData);

        return redirect()->route('on-duty.step-three', ['id' => $application->id]);
    }

    public function storeStepThree(Request $request){

        $validatedData = $request->validate([
            'location' => 'required|string',
            'start_date' => 'required',
            'end_date' => 'nullable',
        ]);
        $application = $this->repository->storeStepThree($validatedData);

        return redirect()->route('on-duty.verify', ['id' => $application->id]);
    }

    public function submit(Request $request){

        $application = $this->repository->storeApplication();

        return redirect()->route('on-duty.submission', [
            'application' => $application,
        ]);
    }

}
