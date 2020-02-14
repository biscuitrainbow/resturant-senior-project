<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSizeOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('size_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('additional_price')->default(0);
            $table->timestamps();
            $table->softDeletes();	
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('size_options');
    }
}
