<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRunOrderTimelineGujaratiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('run_order_timeline_gujarati', function (Blueprint $table) {
            $table->id();
            $table->integer('run_order')->nullable();
            $table->integer('timeline')->nullable();
            $table->date('timeline_date')->nullable();
            $table->time('timeline_time')->nullable();
            $table->string('duration')->nullable();
            $table->time('next_run_order')->nullable();
            $table->integer('total_stories')->nullable();
            $table->integer('total_advertisement')->nullable();
            $table->integer('total_slide_show')->nullable();
            $table->integer('total_video')->nullable();
            $table->enum('live_striming',['Yes','No']);
            $table->time('live_begin_time')->nullable();
            $table->string('live_begin_duration')->nullable();
            $table->integer('prepared_by')->nullable();
            $table->integer('approved_by')->nullable();
            $table->string('story_detail')->nullable();
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
        Schema::dropIfExists('run_order_timeline_gujarati');
    }
}
