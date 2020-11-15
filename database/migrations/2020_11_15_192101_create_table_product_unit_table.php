<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProductUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_unit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_fk')->unique();
            $table->bigInteger('unit1_fk');
            $table->bigInteger('qty1');
            $table->bigInteger('unit2_fk');
            $table->bigInteger('qty2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_unit');
    }
}
