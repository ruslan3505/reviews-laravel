<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableReviewsColumnParentId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn('parent_id');
        });
        Schema::table('reviews', function (Blueprint $table) {
            $table->integer('parent_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->integer('parent_id');
        });
        Schema::table('reviews', function (Blueprint $table) {
            $table->integer('parent_id')->nullable();
        });
    }
}
