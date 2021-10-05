<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoryGujaratiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('story_gujarati', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('cover_detail')->nullable();
			$table->string('audio_file')->nullable();
            $table->string('short_description')->nullable();
            $table->text('long_description')->nullable();
			$table->text('story_points')->nullable();
            $table->integer('timeline_category')->nullable();
            $table->date('timeline_date')->nullable();
			$table->string('timeline_time', 10)->nullable();
            $table->integer('story_type_category')->nullable();
            $table->integer('story_by')->nullable();
            $table->string('city')->nullable();
			$table->string('slug')->nullable();
            $table->integer('story_upload')->nullable();
            $table->enum('status', ['Active', 'InActive']);
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
        Schema::dropIfExists('story_gujarati');
    }
}
