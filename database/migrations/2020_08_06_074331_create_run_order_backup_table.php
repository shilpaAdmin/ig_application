<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRunOrderBackupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('run_order_backup', function (Blueprint $table) {
            $table->id();
            $table->string('run_order_number')->nullable();
            $table->integer('run_order_id')->nullable();
            $table->integer('module_id')->nullable();
            $table->enum('type',['story','advt']);
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
        Schema::dropIfExists('run_order_backup');
    }
}
