<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillCodeTable extends Migration
{
    public function up()
    {
        Schema::create('bill_code', function (Blueprint $table) {
            $table->string('bill_code')->nullable();
            $table->string('keterangan')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bill_code');
    }
}
