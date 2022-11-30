<?php
/*
|--------------------------------------------------------------------------
| database/migrations/2018_01_28_194251_create_rooms_table.php *** Copyright netprogs.pl | available only at Udemy.com | further distribution is prohibited  ***
|--------------------------------------------------------------------------
*/

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->integer('room_number');
            $table->integer('room_size');
            $table->integer('price');
            $table->text('description');
            $table->bigInteger('object_id')->unsigned();
            $table->foreign('object_id')->references('id')->on('objects')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}

