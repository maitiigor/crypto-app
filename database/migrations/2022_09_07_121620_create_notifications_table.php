<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('notification_id')->nullable();
            $table->string('type')->nullable();
            $table->string('address')->nullable();
            $table->string('address_id')->nullable();
            $table->string('payment_date')->nullable();
            $table->decimal('amount',12,2)->default(0)->nullable();
            $table->string('currency')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('transaction_resource_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
