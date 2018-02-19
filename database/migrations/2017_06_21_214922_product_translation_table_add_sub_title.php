<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductTranslationTableAddSubTitle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_translations', function (Blueprint $table) {
            $table->string('sub_title')->nullable()->default(null)->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_translations', function (Blueprint $table) {
            $table->dropColumn('sub_title');
        });
    }
}
