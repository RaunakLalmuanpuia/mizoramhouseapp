<?php

namespace App\Repositories;

use App\Models\Application;
use Illuminate\Support\Facades\Session;

class OnDutyRepository
{
    private const SESSION_KEY = 'on-duty-info';
    private const FAMILY_KEY = 'family-list';
    public function updateType(){

        $application_id = Session::get('application_id'); // Get stored application_id
        $application = Application::findOrFail($application_id);
        $application->update([
            'type' => "ON-DUTY"
        ]);
        if (!$application_id) {
            abort(403, 'No application found.');
        }
        return $application;
    }
    public function getDraft()
    {
        $application_id = Session::get('application_id');

        if (!$application_id) {
            return null;
        }
        $application = Application::with(['onDutyDetails', 'familyMembers'])
            ->where('id', $application_id)
            ->first();

        // Ensure previously submitted applications are not loaded as drafts
        if ($application && $application->status === "SUBMITTED") {
            return null;
        }

        return Application::with(['onDutyDetails', 'familyMembers'])
            ->where('id', $application_id)
            ->first();
    }
    public function storeStepOne()
    {
        $session_id = Session::getId(); // Unique session identifier

        // Check if an application already exists for this session
        $application = Application::where('session_id', $session_id)->first();

        if (!$application) {
            $application = Application::create([
                'session_id' => $session_id, // Store session ID to prevent duplication
                'type' => 'ON-DUTY',
                'status' => 'DRAFT',

            ]);
        }

        // Store application_id in session for easy access
        Session::put('application_id', $application->id);

        return $application;
    }
    public function storeStepTwo(array $data)
    {
        $application_id = Session::get('application_id'); // Get stored application_id

        if (!$application_id) {
            abort(403, 'No application found.');
        }

        // Retrieve application and update details
        $application = Application::findOrFail($application_id);

        $application->update([
            'applicant_name' => $data['applicant_name'],
            'gender' => $data['gender'],
            'designation' => $data['designation'],
            'department' => $data['department'],
            'contact' => $data['contact'],
            'department_approval' => $data['department_approval'],
        ]);

        // Handle FLAM details (Avoid duplicates)
        if (!empty($data['on_duty_details'])) {
            foreach ($data['on_duty_details'] as $onDuty) {
                $application->onDutyDetails()->updateOrCreate(
                    ['name' => $onDuty['name'], 'contact' => $onDuty['contact']],
                    $onDuty
                );
            }
        }

        // Handle Family details (Avoid duplicates)
        if (!empty($data['family_details'])) {
            foreach ($data['family_details'] as $family) {
                $application->familyMembers()->updateOrCreate(
                    ['name' => $family['name'], 'relation' => $family['relation']],
                    $family
                );
            }
        }
        // Store application_id in session for easy access
        Session::put('application_id', $application->id);

        return $application;
    }

    public function storeStepThree(array $data)
    {
        $application_id = Session::get('application_id'); // Get stored application_id

        if (!$application_id) {
            abort(403, 'No application found.');
        }

        // Retrieve application and update details
        $application = Application::findOrFail($application_id);

        $application->update([
            'location' => $data['location'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
//            'contact' => $data['contact'],
        ]);

        // Store application_id in session for easy access
        Session::put('application_id', $application->id);
        return $application;
    }

    public function storeApplication(){
        $application_id = Session::get('application_id'); // Get stored application_id
        if (!$application_id) {
            abort(403, 'No application found.');
        }

        // Retrieve application and update details
        $application = Application::findOrFail($application_id);
        $application->update([
            'status' => "SUBMITTED"
        ]);
        Session::put('application_id', $application->id);
// Clone the application data before clearing session
        $submittedApplication = clone $application;

        Session::forget('application_id');
        Session::forget(self::SESSION_KEY);
        Session::forget(self::FAMILY_KEY);

        Session::regenerate();

        return $submittedApplication;
    }


}
