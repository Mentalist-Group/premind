<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTStudyContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_study_contents', function (Blueprint $table) {
            // 項目定義
            $table->bigIncrements('study_id');
            $table->string('study_title');
            $table->string('content')->nullable();
            $table->string('interval_type');
            $table->integer('study_times');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            // 外部キー設定
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_study_contents');
    }
}
