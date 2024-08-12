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

    // Define the relationship
    public function media()
    {
        return $this->hasMany(Media::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function qrcode()
    {
        return $this->hasOne(UserQrcode::class, 'user_id', 'user_id');
    }
}
