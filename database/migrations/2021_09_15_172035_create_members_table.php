<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('name', 100);
            $table->string('surname', 150);
            $table->string('live', 50);
            $table->tinyInteger('experience');
            $table->tinyInteger('registered');
            $table->integer('reservoir_id')->unsigned();
            $table->foreign('reservoir_id')->references('id')->on('reservoirs');
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
        Schema::dropIfExists('members');
    }
}
