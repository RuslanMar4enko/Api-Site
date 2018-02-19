<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWidgetTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widget_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('widget_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['widget_id','locale']);
            $table->foreign('widget_id')->references('id')->on('widgets')->onDelete('cascade');

            $table->string('title')->nullable()->default(null)->index();
            $table->string('description')->nullable()->default(null)->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('widget_translations');
    }
}
