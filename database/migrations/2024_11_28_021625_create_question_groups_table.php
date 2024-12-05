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
        Schema::create('question_groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('test_id');
            $table->string('group_name');
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');
        });

        Schema::table('questions', function (Blueprint $table) {
            $table->unsignedBigInteger('question_group_id')->nullable()->after('id');
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
        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign(['question_group_id']);
            $table->dropColumn('question_group_id');
        });

        Schema::dropIfExists('question_groups');
    }
};
