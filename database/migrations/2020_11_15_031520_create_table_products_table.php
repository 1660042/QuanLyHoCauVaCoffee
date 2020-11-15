<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->bigInteger('type_product_fk');
            $table->double('cost_price')->default(0);
            $table->double('price')->default(0);
            $table->bigInteger('unit_fk')->nullable();
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
        Schema::dropIfExists('products');
    }
}
