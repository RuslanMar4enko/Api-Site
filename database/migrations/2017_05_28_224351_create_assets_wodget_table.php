<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsWodgetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_widget', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('asset_id')->nullable()->default(null)->unsigned()->index();
            $table->integer('widget_id')->nullable()->default(null)->unsigned()->index();
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
        Schema::dropIfExists('asset_widget');
    }
}
