<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEarningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('earnings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('referal_id')->nullable()->constrained('referals')->onDelete('cascade');
            $table->decimal('amount', 12, 2)->nullable()->default(0);
            $table->integer('day_earning')->nullable();
            $table->foreignId('investment_plan_id')->nullable()->constrained('investment_plans')->onDelete('cascade');
            $table->foreignId('deposit_id')->nullable()->constrained('deposits')->onDelete('cascade');
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
        Schema::dropIfExists('earnings');
    }
}
