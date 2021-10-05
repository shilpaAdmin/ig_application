<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeetypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employeetype', function (Blueprint $table) {
            $table->id();
            $table->string('employeetypeTitle')->nullable();
            $table->string('employeetypeCode')->nullable();
            $table->text('employeetypeDesc')->nullable();
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
        Schema::dropIfExists('employeetype');
    }
}
