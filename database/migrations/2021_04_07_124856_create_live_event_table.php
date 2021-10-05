<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiveEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_event', function (Blueprint $table) {
            $table->id();
			$table->enum('live_mode',['on', 'off'])->nullable();
			$table->string('user_name', 100)->nullable();
			$table->string('live_channel_id', 500)->nullable();
			$table->string('city', 200);
			$table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('agenda', 500)->nullable();
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
        Schema::dropIfExists('live_event');
    }
}
