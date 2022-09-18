<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 12, 2)->nullable()->default(0);
            $table->decimal('verified_amount', 12, 2)->nullable()->default(0);
            $table->foreignId('investment_plan_id')->constrained('investment_plans')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->boolean('is_verified')->default(0);
            $table->string('address')->nullable();
            $table->string('address_id')->nullable();
            $table->string('name')->nullable();
            $table->string('currency');
            $table->string('network')->nullable();
            $table->string('resource')->nullable();
            $table->string('resource_path')->nullable();
            $table->boolean('is_completed')->default(0);
            $table->boolean('is_verification_passed')->default(0);
            $table->boolean('is_investment_period_completed')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deposits');
    }
}
