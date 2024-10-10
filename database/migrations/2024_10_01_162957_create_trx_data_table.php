<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('trx_data', function (Blueprint $table) {
            $table->bigIncrements('trx_data_id');
            $table->string('trx_time_stamp')->nullable();
            $table->integer('bill_data_id')->nullable();
            $table->integer('channel_id')->nullable();
            $table->string('response_code')->nullable();
            $table->string('response_message')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('payment_amount')->nullable();
            $table->string('event')->nullable();
            $table->string('bill_code')->nullable();

            $table->primary('trx_data_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('trx_data');
    }

};
