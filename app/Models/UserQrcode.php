<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQrcode extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the user that owns the UserQrcode
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function qrcode()
    {
        return $this->belongsTo(Qrcode::class, 'qrcode_id');
    }
}
