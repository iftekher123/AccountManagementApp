<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactiondetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('account_id');
            $table->date('value_date');
            $table->string('currency');
            $table->float('debit_amount');
            $table->string('credit_amount');
            $table->string('transaction_type');
			$table->string('transaction_narrative');	
			$table->timestamps();
			$table->foreign('account_id')
            ->references('id')
            ->on('accounts')
			->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_details');
    }
}
