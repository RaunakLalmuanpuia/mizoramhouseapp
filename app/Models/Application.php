<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'status',
        'session_id',
        'applicant_name',
        'gender',
        'designation',
        'department',
        'department_approval',
        'contact',
        'location',
        'start_date',
        'end_date'];

    public function flamDetails() {
        return $this->hasMany(FlamDetail::class);
    }

    public function onDutyDetails() {
        return $this->hasMany(ONDUTY::class);
    }

    public function familyMembers() {
        return $this->hasMany(FamilyMember::class);
    }

}
