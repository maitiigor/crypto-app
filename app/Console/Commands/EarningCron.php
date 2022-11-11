<?php

namespace App\Console\Commands;

use App\Models\Deposit;
use App\Models\Earning;
use App\Models\User;
use Illuminate\Console\Command;

class EarningCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'earning:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate user daily earnings';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        \Log::info("Cron is working fine!");

        $deposits = Deposit::where('is_verified', true)->where('is_investment_period_completed', false)->get();

        foreach ($deposits as $key => $deposit) {
            # code...
            $investment_plan = $deposit->investment_plan;
            if ($investment_plan != null) {

                $investment_days = $investment_plan->days_duration;
                $investment_profit = $investment_plan->profit_percentage;
                $daily_profit = $investment_profit / $investment_days;

                $earning_amount = $daily_profit / 100 * $deposit->amount;

                $earning_exist = Earning::where('user_id', $deposit->user_id)->where('deposit_id', $deposit->id)->where('investment_plan_id', $investment_plan->id)->orderBy('created_at', 'DESC')->first();

                if ($earning_exist == null) {

                    $earning = new Earning();

                    $earning->user_id = $deposit->user_id;
                    $earning->amount = $earning_amount;
                    $earning->day_earning = 1;
                    $earning->investment_plan_id = $investment_plan->id;
                    $earning->deposit_id = $deposit->id;
                    $earning->save();

                    \Log::info("Created new earning");
                } else {
                    $earning_day = $earning_exist->day_earning;

                    if ($earning_day < $investment_days) {
                        $earning_day = $earning_exist->day_earning + 1;
                        $earning = new Earning();
                        $earning->user_id = $deposit->user_id;
                        $earning->amount = $earning_amount;
                        $earning->day_earning = $earning_day;
                        $earning->investment_plan_id = $investment_plan->id;
                        $earning->deposit_id = $deposit->id;
                        $earning->save();
                        \Log::info("Updated new earning");

                    }
                   
                    if ($earning_day == $investment_days) {
                        $deposit->is_investment_period_completed = 1;
                        $deposit->save();

                        $user = $deposit->user;

                        if ($user != null) {
                           $total_earning = Earning::where('user_id', $deposit->user_id)->where('deposit_id', $deposit->id)->where('investment_plan_id', $investment_plan->id)->sum('amount');
                            $user->account_balance = $user->account_balance + $deposit->amount + $total_earning;
                            $user->save();
                            \Log::info("deposit investment period completed new earning");
                        }
                        \Log::info("the total {$total_earning}");
                    }
                }

            }
        }
        //return 0;
    }

}
