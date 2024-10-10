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
        Schema::create('bill_data', function (Blueprint $table) {
            $table->bigIncrements('bill_data_id');
            $table->string('bill_key1')->nullable();
            $table->string('bill_key2')->nullable();
            $table->string('bill_key3')->nullable();
            $table->string('bill_info1')->nullable();
            $table->string('bill_info2')->nullable();
            $table->string('bill_info3')->nullable();
            $table->string('bill_info4')->nullable();
            $table->string('bill_info5')->nullable();
            $table->string('bill_info6')->nullable();
            $table->string('bill_info7')->nullable();
            $table->string('bill_info8')->nullable();
            $table->string('bill_info9')->nullable();
            $table->string('bill_info10')->nullable();
            $table->string('bill_info11')->nullable();
            $table->string('bill_info12')->nullable();
            $table->string('bill_info13')->nullable();
            $table->string('bill_info14')->nullable();
            $table->string('bill_info15')->nullable();
            $table->string('bill_info16')->nullable();
            $table->string('bill_info17')->nullable();
            $table->string('bill_info18')->nullable();
            $table->string('bill_info19')->nullable();
            $table->string('bill_info20')->nullable();
            $table->string('bill_info21')->nullable();
            $table->string('bill_info22')->nullable();
            $table->string('bill_info23')->nullable();
            $table->string('bill_info24')->nullable();
            $table->string('bill_info25')->nullable();
            $table->string('period_open')->nullable();
            $table->string('period_close')->nullable();
            $table->char('flag_skip_date', 1)->nullable();
            $table->string('currency')->nullable();
            $table->string('create_who')->nullable();
            $table->date('create_date')->nullable();
            $table->string('change_who')->nullable();
            $table->date('change_date')->nullable();
            $table->binary('terminalid')->nullable();
            $table->decimal('mahasiswa')->nullable();
            $table->decimal('tahun')->nullable();
            $table->decimal('flag_bayar')->nullable();
            $table->decimal('bill_rekening')->nullable();
            $table->date('tanggal_bayar')->nullable();
            $table->decimal('mahasiswa_prestasi')->nullable();
            $table->decimal('pengalihan')->nullable();
            $table->decimal('bebas_spi')->nullable();
            $table->decimal('pendaftar')->nullable();
            $table->decimal('pegawai')->nullable();
            $table->string('pendaftaran')->nullable();
            $table->string('xcicilan_detil')->nullable();
            $table->string('tahun_kalender')->nullable();
            $table->decimal('legalisir_nota')->nullable();
            $table->string('semester')->nullable();
            $table->string('xcicilan_lampau')->nullable();
            $table->string('jenis_ukt')->nullable();
            $table->string('bill_key1_1')->nullable();
            $table->decimal('xtagihan_blu_detil')->nullable();

            $table->primary('bill_data_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bill_data');
    }

};
