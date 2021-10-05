<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsfirstReaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsfirst_reader', function (Blueprint $table) {
            $table->id();
			$table->enum('app_type', ['justin', 'english', 'gujarati']);
			$table->text('user_id')->nullable();
            $table->text('token_id')->nullable();
            $table->text('device_model')->nullable();
            $table->enum('device_type', ['android', 'ios'])->nullable();
			$table->enum('notification_flag', ['Active', 'InActive']);
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
        Schema::dropIfExists('newsfirst_reader');
    }
}
