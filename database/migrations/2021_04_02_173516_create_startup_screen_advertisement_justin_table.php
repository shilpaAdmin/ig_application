<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartupScreenAdvertisementJustinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('startup_screen_advertisement_justin', function (Blueprint $table) {
            $table->id();
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();
			$table->integer('edited_by')->nullable();
			$table->string('image_file',100)->nullable();
			$table->enum('status', ['Active', 'InActive']);
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
        Schema::dropIfExists('startup_screen_advertisement_justin');
    }
}
