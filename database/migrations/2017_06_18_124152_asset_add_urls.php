<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AssetAddUrls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->string('product_large_thumbnail');
            $table->string('product_little_thumbnail');
            $table->string('widget_thumbnail');
            $table->string('article_large_thumbnail');
            $table->string('article_little_thumbnail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->dropColumn('product_large_thumbnail');
            $table->dropColumn('product_little_thumbnail');
            $table->dropColumn('widget_thumbnail');
            $table->dropColumn('article_large_thumbnail');
            $table->dropColumn('article_little_thumbnail');
        });

    }
}
