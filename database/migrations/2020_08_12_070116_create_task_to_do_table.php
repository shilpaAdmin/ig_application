<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskToDoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_to_do', function (Blueprint $table) {
            $table->id();
            $table->integer('task')->nullable();
            $table->string('name')->nullable();
            $table->string('assign_to')->nullable();
            $table->string('completed')->nullable();
            $table->date('due_date')->nullable();
            $table->string('note')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
			$table->enum('task_status', ['Pending', 'Completed', 'Re-Opened'])->default('Pending');
			$table->enum('status', ['Active', 'InActive'])->default('Active');
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
        Schema::dropIfExists('task_to_do');
    }
}
