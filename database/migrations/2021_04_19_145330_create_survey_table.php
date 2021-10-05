<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey', function (Blueprint $table) {
            $table->id();
			$table->string('title',200)->nullable();
			$table->string('description',500)->nullable();
			$table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('app_type', ['english','gujarati','stockup']);			
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
        Schema::dropIfExists('survey');
    }
}
