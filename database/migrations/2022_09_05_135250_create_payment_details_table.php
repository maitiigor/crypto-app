<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_details', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 12, 2)->nullable()->default(0);
            $table->string('attempt_code')->nullable();
            $table->string('gateway_reference_code')->nullable();
            $table->string('gateway_name')->nullable();
            $table->string('gateway_url')->nullable();
            $table->string('gateway_initialization_response')->nullable();
            $table->string('is_verified')->nullable();
            $table->string('is_verification_passed')->nullable();
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
        Schema::dropIfExists('payment_details');
    }
}
