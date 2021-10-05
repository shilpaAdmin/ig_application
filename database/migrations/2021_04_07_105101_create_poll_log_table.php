<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poll_log', function (Blueprint $table) {
            $table->id();
			$table->integer('poll_id')->nullable();
			$table->json('user_poll_vote_json')->nullable();
			$table->enum('app_type', ['justin', 'english', 'gujarati']);
			$table->text('user_id')->nullable();
            $table->text('token_id')->nullable();
            $table->text('device_model')->nullable();
            $table->enum('device_type', ['android', 'ios'])->nullable();
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
        Schema::dropIfExists('poll_log');
    }
}
