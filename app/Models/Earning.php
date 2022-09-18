<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Earning extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
    ];

    /**
     * Get the investment_plan that owns the Earning
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function investment_plan()
    {
        return $this->belongsTo(InvestmentPlan::class, 'investment_plan_id', 'id');
    }

    public function deposit()
    {
        return $this->belongsTo(Deposit::class, 'deposit_id', 'id');
    }

    /**
     * Get the user that owns the Earning
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function referal()
    {
        return $this->belongsTo(Referal::class, 'referal_id', 'id');
    }

}
