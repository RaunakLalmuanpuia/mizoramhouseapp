<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FlamApplicationRepository;
use Inertia\Inertia;

class FlamApplicationController extends Controller
{
    //
    protected $flamApplicationRepository;

    public function __construct(FlamApplicationRepository $repository)
    {
        $this->flamApplicationRepository = $repository;
    }
    public function createApplication()
    {
        // Create a new application record
        $application = $this->flamApplicationRepository->createApplication();

        // Redirect to step two with the new application ID
        return redirect()->route('flam.step-two', ['id' => $application->id]);
    }
    public function showStepTwo($id)
    {
        $application = $this->flamApplicationRepository->getApplication($id);

        if (!$application) {
            return redirect()->route('step-one')->with('error', 'Application not found.');
        }

        return Inertia::render('Form/FLAM/StepTwo', [
            'application' => $application
        ]);
    }



    public function store(Request $request)
    {
//        dd($request->all());
        $validatedData = $request->validate([
            'applicant_name' => 'required',
            'gender' => 'required',
            'designation' => 'required',
            'contact' => 'required',
            'flam_details' => 'nullable|array',
            'family_details' => 'nullable|array',
        ]);

        $application = $this->flamApplicationRepository->storeApplication([
            'type' => 'FLAM',
            'applicant_name' => $validatedData['applicant_name'],
            'contact' => $validatedData['contact'],
            'gender' => $validatedData['gender'],
            'designation' => $validatedData['designation'],
        ]);

        $this->flamApplicationRepository->storeFlamDetails($application->id, $validatedData['flam_details'] ?? []);

        if (!empty($validatedData['family_details'])) {
            $this->flamApplicationRepository->storeFamilyMembers($application->id, $validatedData['family_details']);
        }

        session(['flam_application_id' => $application->id]);

        return redirect()->route('step-three', ['id' => $application->id]);
    }


    public function locationPage($id)
    {
        $application = $this->flamApplicationRepository->getApplication($id);

        return Inertia::render('Form/StepThree', ['application' => $application]);
    }
    public function showLocationStep($id)
    {
        $application = $this->flamApplicationRepository->getApplication($id);

        if (!$application) {
            return redirect()->route('flam.step-two')->with('error', 'Application not found.');
        }

        return Inertia::render('Form/StepThree', [
            'application' => $application
        ]);
    }

    public function storeLocation(Request $request, $id)
    {
        $request->validate([
            'location' => 'required|string',
        ]);

        $this->flamApplicationRepository->updateApplication($id, ['location' => $request->location]);

        return redirect()->route('flam.verify', ['id' => $id]);
    }

    public function show($id)
    {
        $application = $this->flamApplicationRepository->getApplication($id);
        return Inertia::render('FlamApplication/Show', ['application' => $application]);
    }

    public function getApplication($id)
    {
        $application = $this->flamApplicationRepository->getApplication($id);

        if (!$application) {
            return response()->json(['message' => 'Application not found'], 404);
        }

        return response()->json($application);
    }
}
