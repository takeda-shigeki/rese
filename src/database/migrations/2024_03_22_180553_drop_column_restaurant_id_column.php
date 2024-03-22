<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnRestaurantIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hosts', function (Blueprint $table) {
            $table->dropForeign('hosts_restaurant_id_foreign');
            $table->dropColumn('restaurant_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hosts', function (Blueprint $table) {
            $table->unsignedBigInteger('restaurant_id')->after('user_id');
            $table->foreign('restaurant_id')->references('restaurant_id')->on('restaurants');
        });
    }
}
