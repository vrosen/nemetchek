<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('todo_id');
            $table->string('name', 100)->nullable();
            $table->text('description')->nullable();
            $table->boolean('done')->default(0);
            $table->timestamps();

            $table->foreign('todo_id')->references('id')->on('todos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->dropForeign('items_todo_id_foreign');
        });

        Schema::dropIfExists('items');
    }
}
