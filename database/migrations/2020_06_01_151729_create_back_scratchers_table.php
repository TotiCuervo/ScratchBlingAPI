<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBackScratchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('back_scratchers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item_name');
            $table->text('item_description');
            $table->string('item_size')->unsigned();
            $table->foreign('item_size')->references('size')->on('item_sizes')->onDelete('cascade');
            $table->decimal('item_cost', 15, 2);
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
        Schema::dropIfExists('back_scratchers');
    }
}
