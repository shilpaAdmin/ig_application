<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRunOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('run_order', function (Blueprint $table) {
            $table->id();
            $table->integer('timeline')->nullable();
            $table->string('app_lang')->nullable();
            $table->date('date')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->string('duration')->nullable();
            $table->time('next_run_order')->nullable();
            $table->integer('total_stories')->nullable();
            $table->integer('total_advertisement')->nullable();
            $table->integer('total_slide_show')->nullable();
            $table->integer('total_video')->nullable();
            $table->enum('live_striming', ['Yes', 'No']);
            $table->time('live_begin_time')->nullable();
            $table->time('live_begin_end_time')->nullable();
            $table->string('live_begin_duration')->nullable();
            $table->integer('prepared_by')->nullable();
            $table->integer('approved_by')->nullable();
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
        Schema::dropIfExists('run_order');
    }
}
