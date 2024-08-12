<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'summary',
        'type',
        'file_path',
        'video_url',
        'passedaway_id',
    ];

    // Define the inverse relationship
    public function passedaway()
    {
        return $this->belongsTo(Passedaway::class);
    }
}
