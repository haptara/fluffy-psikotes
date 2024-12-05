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
        Schema::create('user_test_progress', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // ID user
            $table->unsignedBigInteger('test_id'); // ID tes
            $table->unsignedBigInteger('question_group_id'); // ID grup soal
            $table->timestamp('start_at')->nullable(); // Waktu mulai pengerjaan
            $table->timestamp('end_at')->nullable(); // Waktu selesai pengerjaan
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');
            $table->foreign('question_group_id')->references('id')->on('question_groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_test_progress');
    }
};
