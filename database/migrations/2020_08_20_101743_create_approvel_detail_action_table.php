<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovelDetailActionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approvel_detail_action', function (Blueprint $table) {
            $table->id();
            $table->integer('approvel_id')->nullable();
            $table->string('action_name')->nullable();
            $table->string('department_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('note_1')->nullable();
            $table->string('custom_file')->nullable();
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
        Schema::dropIfExists('approvel_detail_action');
    }
}
