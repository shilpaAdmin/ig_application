<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_detail', function (Blueprint $table) {
            $table->id();
			$table->integer('survey_id');
			$table->string('question',300)->nullable();
			$table->json('option_json')->nullable();
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
        Schema::dropIfExists('survey_detail');
    }
}
