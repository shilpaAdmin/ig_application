<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHolidayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holiday', function (Blueprint $table) {
            $table->id();
			$table->string('holidayTitle')->nullable();
			$table->enum('holidayDate', ['Single', 'Multiple']);
			$table->date('holidayTodate')->nullable();
			$table->date('holidayFromdate')->nullable();
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
        Schema::dropIfExists('holiday');
    }
}
