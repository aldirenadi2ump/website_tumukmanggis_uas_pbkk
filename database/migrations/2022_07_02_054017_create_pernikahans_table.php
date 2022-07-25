<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePernikahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pernikahans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pria')->nullable();
            $table->string('tmpat_lahirpria')->nullable();
            $table->date('tgl_lahirpria')->nullable();
            $table->string('pekerjaan_pria')->nullable();
            $table->string('alamat_pria')->nullable();
            $table->string('anggota_pria')->nullable();
            $table->string('saksi_pria')->nullable();

            $table->string('nama_wanita')->nullable();
            $table->string('tmpat_lahirwanita')->nullable();
            $table->date('tgl_lahirwanita')->nullable();
            $table->string('pekerjaan_wanita')->nullable();
            $table->string('alamat_wanita')->nullable();
            $table->string('anggota_wanita')->nullable();
            $table->string('saksi_wanita')->nullable();
            $table->date('tgl_pernikahan')->nullable();
            $table->date('tmpt_pernikahan')->nullable();
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
        Schema::dropIfExists('pernikahans');
    }
}
