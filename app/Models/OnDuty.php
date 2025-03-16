<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnDuty extends Model
{
    use HasFactory;

    protected $fillable = ['application_id', 'name', 'designation','department', 'gender', 'contact', 'department_approval'];
    public function application() {
        return $this->belongsTo(Application::class);
    }

}
