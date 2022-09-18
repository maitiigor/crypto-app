<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    //public $table = 'deposits';

    protected $fillable = [
        'amount', 
        'investment_plan_id', 
        'is_verified', 
        'verified_amount', 
        'address', 
        'address_id', 
        'name', 
        'currency', 
        'network', 
        'resource',
        'resource_path',
        'is_completed',
        'is_verification_passed'
    ];

    protected $casted = [
        'is_verified' => 'boolean',
        'is_completed' => 'boolean',
        'is_verfication_passed' => 'boolean'
    ];

    /**
     * Get the investment plan that owns the Deposit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function investment_plan()
    {
        return $this->belongsTo(InvestmentPlan::class, 'investment_plan_id', 'id');
    }

    /**
     * Get the user that owns the Deposit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
