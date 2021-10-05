<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavemasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leavemaster', function (Blueprint $table) {
            $table->id();
			$table->string('leaveType')->nullable();
			$table->string('creditType')->nullable();
			$table->enum('carryForward', ['Yes', 'No']);
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
        Schema::dropIfExists('leavemaster');
    }
}
