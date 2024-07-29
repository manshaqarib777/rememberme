<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passedaway extends Model
{
    use HasFactory;
    protected $guarded = [];
    // Define the accessors
    public function getBirthDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getDeathDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}
