<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id', false, true);
            $table->enum('category', ['lezecky', 'istenie', 'karabina', 'sedak', 'prilba', 'vrecusko na magnezium', 'magnezium', 'lanp']);
            $table->string('nazov', 100);
            $table->string('znacka', 100);
            $table->integer('pocet');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment');
    }
}
