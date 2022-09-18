<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('user_name')->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('bitcoin_account_id')->nullable();
            $table->string('ethereum_account_id')->nullable();
            $table->string('litecoin_account_id')->nullable();
            $table->string('tron_account_id')->nullable();
            $table->string('doge_account_id')->nullable();
            $table->decimal('account_balance', 12, 2)->nullable()->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
