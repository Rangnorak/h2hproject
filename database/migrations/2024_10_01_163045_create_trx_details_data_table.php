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
        Schema::create('trx_details_data', function (Blueprint $table) {
            $table->bigIncrements('trx_details_data_id');
            $table->string('reversed_flag')->nullable();
            $table->bigInteger('reversed_date')->nullable();
            $table->bigInteger('bill_details_id')->nullable();

            $table->primary('trx_details_data_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('trx_details_data');
    }

};
