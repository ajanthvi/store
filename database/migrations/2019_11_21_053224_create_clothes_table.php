<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClothesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clothes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name', 255);
            $table->string('product_code', 255);
            $table->text('short_description');
            $table->double('cost');
            $table->double('selling_price');
            $table->bigInteger('brand_id')->unsigned();
            $table->string('color', 50);
            $table->string('size', 10);

            $table->index(["brand_id"], 'fk_clothes_brands1_idx');

            $table->unique(["id"], 'id_UNIQUE');
            $table->nullableTimestamps();


            $table->foreign('brand_id', 'fk_clothes_brands1_idx')
                ->references('id')->on('brands')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clothes');
    }
}
