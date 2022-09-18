<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_name',
        'account_id'
    ];

    protected $casted = [
        'account_name' => 'string',
        'account_id' => 'string'
    ];
}
