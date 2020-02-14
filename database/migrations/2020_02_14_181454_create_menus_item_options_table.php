<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusItemOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus_item_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreign('other_option_id')->references('id')->on('other_options');
            $table->unsignedBigInteger('other_option_id');
            $table->foreign('order_item_id')->references('id')->on('order_items');
            $table->unsignedBigInteger('order_item_id');
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
        Schema::dropIfExists('menus_item_options');
    }
}
