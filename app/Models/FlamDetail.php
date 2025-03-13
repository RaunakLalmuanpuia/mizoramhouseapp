<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlamDetail extends Model
{
    use HasFactory;
    protected $fillable = ['application_id', 'flam_name', 'designation', 'gender', 'contact'];

    public function application() {
        return $this->belongsTo(Application::class);
    }
}
