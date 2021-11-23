<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBreakdownsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breakdowns', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('type');
            $table->timestamps();
        });

        Schema::create('breakdown_repair', function (Blueprint $table) {
            $table->unsignedInteger('repair_id');
            $table->unsignedInteger('breakdown_id');
        });

        Schema::table('breakdown_repair', function (Blueprint $table) {
            $table->foreign('repair_id')->references('id')->on('repairs')->onDelete('cascade');
            $table->foreign('breakdown_id')->references('id')->on('computers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('breakdowns');
    }
}
