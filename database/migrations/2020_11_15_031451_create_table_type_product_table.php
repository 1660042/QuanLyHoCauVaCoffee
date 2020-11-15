<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTypeProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->tinyInteger('status')->default('0');
            $table->tinyInteger('view')->default('0');
            $table->tinyInteger('type')->nullable();
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
        Schema::dropIfExists('type_product');
    }
}
