<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankCashAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_cash_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('account_name',50);
            $table->decimal('opening_balance',8,2);
            $table->text('note')->nullable();
            $table->integer('create_user_id');
            $table->integer('update_user_id')->nullable();
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
        Schema::dropIfExists('bank_cash_accounts');
    }
}
