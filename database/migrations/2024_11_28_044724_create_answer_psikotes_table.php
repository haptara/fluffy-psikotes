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
        Schema::create('answer_psikotes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained('questions')->onDelete('cascade'); // Relasi ke Questions
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relasi ke Users
            $table->text('answer_text')->nullable(); // Jawaban untuk esai
            $table->foreignId('selected_choice_id')->nullable()->constrained('choices')->onDelete('cascade'); // Jawaban untuk pilihan ganda
            $table->integer('score')->nullable();
            $table->timestamp('answered_at')->nullable();
            $table->boolean('is_flagged')->default(false);
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
        Schema::dropIfExists('answer_psikotes');
    }
};
