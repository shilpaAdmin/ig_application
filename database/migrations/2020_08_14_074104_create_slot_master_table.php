<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlotMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slot_master', function (Blueprint $table) {
            $table->id();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->string('hours')->nullable();
            $table->enum('is_prime',['is_prime','not_prime'])->nullable();
            $table->enum('status',['Active','InActive'])->nullable();
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
        Schema::dropIfExists('slot_master');
    }
}
