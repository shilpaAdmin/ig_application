<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdminSideStatusInTaskToDoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task_to_do', function (Blueprint $table) {
            $table->enum('admin_task_status', ['Panding', 'Completed'])->default('Panding')->after('task_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task_to_do', function (Blueprint $table) {
            //
        });
    }
}
