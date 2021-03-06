<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->integer('level');
            $table->integer('number');
            $table->string('route_name')->nullable();
            $table->bigInteger('menu_fk');
            $table->tinyInteger('type')->nullable();
            $table->tinyInteger('status')->default('0');
            $table->tinyInteger('view')->default('0');
            // $table->timestamp('created_at');
            $table->integer('created_by')->nullable();
            // $table->timestamp('updated_at');
            $table->integer('updated_by')->nullable();
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
}
