<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poll', function (Blueprint $table) {
            $table->id();
			$table->string('poll_question', 300)->nullable();
			$table->string('poll_option', 200)->nullable();
			$table->date('start_date')->nullable();
			$table->time('start_time')->nullable();
			$table->date('end_date')->nullable();
			$table->time('end_time')->nullable();
			$table->integer('edited_by')->nullable();
			$table->enum('is_result_display_to_user', ['yes', 'no']);
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
        Schema::dropIfExists('poll');
    }
}
