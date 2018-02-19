<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacteristicTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characteristic_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('characteristic_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['characteristic_id','locale']);
            $table->foreign('characteristic_id')->references('id')->on('characteristics')->onDelete('cascade');

            $table->string('title')->nullable()->default(null)->index();
            $table->string('value')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characteristic_translations');
    }
}
