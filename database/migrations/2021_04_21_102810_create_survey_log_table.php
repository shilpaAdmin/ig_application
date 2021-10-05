<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_log', function (Blueprint $table) {
            $table->id();
			$table->integer('survey_id')->nullable();
			$table->json('user_survey_vote_json')->nullable();
			$table->enum('app_type', ['stockup', 'english', 'gujarati']);
			$table->text('user_id')->nullable();
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
        Schema::dropIfExists('survey_log');
    }
}
