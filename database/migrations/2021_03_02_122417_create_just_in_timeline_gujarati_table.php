<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJustInTimelineGujaratiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('just_in_timeline_gujarati', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
			$table->string('type')->nullable();
			$table->integer('pintab')->nullable();
            $table->string('image_file')->nullable();
            $table->string('slug')->nullable();
            $table->string('description')->nullable();
            $table->time('time')->nullable();
            $table->string('just_date')->nullable();
            $table->integer('story_by')->nullable();
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
        Schema::dropIfExists('just_in_timeline_gujarati');
    }
}
