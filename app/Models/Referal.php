<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referal extends Model
{
    use HasFactory;

    protected $fillable = [
        'referer_user_id',
        'refered_user_id',
    ];

    /**
     * Get the referal_user that owns the Referal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function referer_user()
    {
        return $this->belongsTo(User::class, 'referer_user_id', 'id');
    }

    public function refered_user()
    {
        return $this->belongsTo(User::class, 'refered_user_id', 'id');
    }
}
