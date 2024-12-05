<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loker_positions', function (Blueprint $table) {
            $table->id();
            $table->string('job_title'); // Nama posisi/jabatan
            $table->text('description')->nullable(); // Deskripsi pekerjaan
            $table->date('open_date'); // Tanggal dibuka
            $table->date('close_date'); // Tanggal ditutup
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
        Schema::dropIfExists('loker_positions');
    }
};
