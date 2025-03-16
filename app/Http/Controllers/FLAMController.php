<?php

namespace App\Http\Controllers;
use App\Models\Application;
use App\Models\FamilyMember;
use App\Repositories\FLAMRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FLAMController extends Controller
{
    //
    private FLAMRepository $repository;

    public function __construct(FLAMRepository $applicationRepository)
    {
        $this->repository = $applicationRepository;
    }
    public function stepOne(){
        return Inertia::render('Form/StepOne', [
//            'application' => $application
        ]);
    }
    public function stepTwo(){
        $applications = $this->repository->getStepTwoData();
//        dd($applications);
        $this->repository->updateType();
        return Inertia::render('Form/FLAM/StepTwo', [
            'application' => $applications
        ]);
    }
    public function stepThree(){
        $applications = $this->repository->getStepTwoData();
        return Inertia::render('Form/StepThree', [
            'application' => $applications
        ]);
    }

    public function verify(){
        $applications = $this->repository->getStepTwoData();
        return Inertia::render('Form/Verify');
    }

    public function submission(){
//        $applications = $this->repository->getStepTwoData();
        return Inertia::render('Form/Submission',[
//            'application' => $applications
        ]);
    }
    public function storeStepOne(Request $request){
//dd($request);
        $application = $this->repository->storeStepOne();

        return redirect()->route('flam.step-two');
    }
    public function storeStepTwo(Request $request){
        $validatedData = $request->validate([
            'applicant_name' => 'required|string',
            'gender' => 'required|string',
            'designation' => 'nullable|string',
            'contact' => 'required|string',
            'application_id' => 'nullable|exists:applications,id',
            'flam_details' => 'array',
            'flam_details.*.flam_name' => 'required|string',
            'flam_details.*.gender' => 'required|string',
            'flam_details.*.designation' => 'nullable|string',
            'flam_details.*.contact' => 'required|string',
            'family_details' => 'array',
            'family_details.*.name' => 'required|string',
            'family_details.*.relation' => 'required|string',
        ]);

        $application = $this->repository->storeStepTwo($validatedData);

        return redirect()->route('flam.step-three', ['id' => $application->id]);
    }
    public function storeStepThree(Request $request){
//        dd($request);
        $validatedData = $request->validate([
            'location' => 'required|string',
            'start_date' => 'required',
            'end_date' => 'nullable',
        ]);
        $application = $this->repository->storeStepThree($validatedData);

        return redirect()->route('flam.verify', ['id' => $application->id]);
    }

    public function submit(Request $request){

        $application = $this->repository->storeApplication();

        return redirect()->route('flam.submission', [
            'application' => $application,
        ]);
    }
    public function resubmit(Request $request){

    }

}
