<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('components', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('brand_id');
            $table->string('serial_number');
            $table->text('comment');
            $table->timestamps();
        });

        Schema::create('component_computer', function (Blueprint $table) {
            $table->unsignedInteger('computer_id');
            $table->unsignedInteger('component_id');
        });

        Schema::table('component_computer', function (Blueprint $table) {
            $table->foreign('computer_id')->references('id')->on('computers')->onDelete('set null');
            $table->foreign('component_id')->references('id')->on('components')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('components');
    }
}
