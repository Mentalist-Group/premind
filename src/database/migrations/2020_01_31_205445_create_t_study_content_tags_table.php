<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTStudyContentTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_study_content_tags', function (Blueprint $table) {
            // 項目定義
            $table->unsignedBigInteger('study_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();

            // 主キー設定
            $table->primary(['study_id', 'tag_id']);

            // 外部キー設定
            $table->foreign('study_id')->references('study_id')->on('t_study_contents');
            $table->foreign('tag_id')->references('tag_id')->on('m_tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_study_content_tags');
    }
}
