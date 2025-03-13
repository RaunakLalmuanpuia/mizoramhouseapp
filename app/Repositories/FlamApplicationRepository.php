<?php
namespace App\Repositories;
use App\Models\Application;
use App\Models\FamilyMember;
use App\Models\FlamDetail;
use Illuminate\Support\Facades\DB;
class FlamApplicationRepository
{

    public function createApplication()
    {
        return Application::create([
            'status' => 'draft',
        ]);
    }

    public function storeApplication($data)
    {
        return Application::updateOrCreate($data);
    }


    public function storeFlamDetails($applicationId, $flamDetails)
    {
        DB::beginTransaction();
        try {
            foreach ($flamDetails as $detail) {
                FlamDetail::updateOrCreate(
                    [
                        'application_id' => $applicationId,
                        'contact' => $detail['contact'],
                    ],
                    [
                        'flam_name' => $detail['flam_name'], // Ensure uniqueness criteria
                        'designation' => $detail['designation'],
                        'gender' => $detail['gender'],

                    ]
                );
            }

            DB::commit(); // Commit changes if all updates succeed
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback in case of an error
            throw $e; // Handle error accordingly (log it or return an error response)
        }
    }


    public function storeFamilyMembers($applicationId, $familyMembers)
    {
        DB::beginTransaction();
        try {
            foreach ($familyMembers as $member) {
                FamilyMember::updateOrCreate(
                    [
                        'application_id' => $applicationId,
                        'name' => $member['name'], // Ensure uniqueness criteria
                    ],
                    [
                        'relation' => $member['relation'],
                    ]
                );
            }

            DB::commit(); // Commit changes if all updates succeed
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback in case of an error
            throw $e; // Handle error accordingly (log it or return an error response)
        }
    }
    public function updateApplication($id, $data)
    {
        return Application::where('id', $id)->update($data);
    }
    public function getApplication($id)
    {
        return Application::with(['flamDetails', 'familyMembers'])->find($id);
    }
}
