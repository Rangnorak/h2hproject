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
        Schema::create('bill_details_data', function (Blueprint $table) {
            $table->bigIncrements('bill_details_id');
            $table->integer('bill_data_id')->nullable();
            $table->string('bill_code')->nullable();
            $table->string('paid_flag')->nullable();
            $table->string('paid_date')->nullable();
            $table->string('ref1')->nullable();
            $table->string('ref2')->nullable();
            $table->string('ref3')->nullable();
            $table->string('bill_name')->nullable();
            $table->string('bill_shortname')->nullable();
            $table->string('bill_amount')->nullable();
            $table->string('bill_info1')->nullable();
            $table->string('pegawai')->nullable();

            $table->primary('bill_details_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bill_details_data');
    }

};
