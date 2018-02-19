<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_id')->nullable()->default(null)->unsigned()->index();

            $table->bigInteger('price')->nullable()->default(null)->index();
            $table->bigInteger('old_pice')->nullable()->nullable()->default(null)->index();

            $table->enum('status', ['PUBLISHED', 'DRAFT', 'PENDING'])->default('PUBLISHED')->index();

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
        Schema::dropIfExists('products');
    }
}
