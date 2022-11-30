<?php
/*
|--------------------------------------------------------------------------
| database/migrations/2018_01_28_194555_create_addresses_table.php *** Copyright netprogs.pl | available only at Udemy.com | further distribution is prohibited  ***
|--------------------------------------------------------------------------
*/

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->integer('number');
            $table->string('street');
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
        Schema::dropIfExists('addresses');
    }
}

