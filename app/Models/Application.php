<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'applicant_name', 'gender', 'designation', 'contact', 'location', 'start_date', 'end_date'];
    public function flamDetails() {
        return $this->hasMany(FlamDetail::class);
    }
    public function familyMembers() {
        return $this->hasMany(FamilyMember::class);
    }
}
