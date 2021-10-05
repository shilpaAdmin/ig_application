<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_feedback', function (Blueprint $table) {
            $table->id();
			$table->text('device_name')->nullable();
			$table->string('mobile_version',300)->nullable();
			$table->string('app_version',70)->nullable();
            $table->string('app_version_code',70)->nullable();
            $table->string('device_width',20)->nullable();
			$table->string('device_height',20)->nullable();
			$table->string('message', 500)->nullable();
			$table->json('document_json')->nullable();
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
        Schema::dropIfExists('user_feedback');
    }
}
