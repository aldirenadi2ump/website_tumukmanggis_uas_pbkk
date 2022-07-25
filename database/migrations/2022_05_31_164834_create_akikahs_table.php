<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkikahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akikahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_anak');
            $table->enum('jeniskelamin', ['Laki-Laki', 'Perempuan']);
            $table->string('nama_ayah');
            $table->date('tgl_akikah');
            $table->string('foto_akikah');
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
        Schema::dropIfExists('akikahs');
    }
}
