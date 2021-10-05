<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiveEventOccurenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_event_occurence', function (Blueprint $table) 
		{
            $table->id();
			$table->integer('live_event_id')->nullable();
			$table->integer('name_plate')->nullable();
			$table->json('matter_plate_json')->nullable();
			$table->tinyInteger('is_deleted')->default(0);
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
        Schema::dropIfExists('live_event_occurence');
    }
}
