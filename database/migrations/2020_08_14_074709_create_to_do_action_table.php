<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToDoActionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('to_do_action', function (Blueprint $table) {
            $table->id();
            $table->integer('task_to_do')->nullable();
            $table->string('task_action')->nullable();
            $table->text('note')->nullable();
            $table->string('file')->nullable();
            $table->string('action_by')->nullable();
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
        Schema::dropIfExists('to_do_action');
    }
}
