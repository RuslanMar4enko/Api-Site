<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['article_id','locale']);
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');

            $table->string('title')->nullable()->default(null)->index();
            $table->string('sub_title')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->text('body')->nullable()->default(null);
            $table->text('epilog')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_translations');
    }
}
