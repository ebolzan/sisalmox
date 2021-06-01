<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->string('room', 200);
            $table->string('block', 200);
            $table->string('owner', 200)->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone', 20)->nullable();
            //  $table->integer('regional_id')->unsigned()->nullable();
            //   $table->foreign('regional_id')->references('id')->on('regionals')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**drop
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warehouses');
    }
}
