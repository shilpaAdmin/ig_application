<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsHeadingInRunOrderBackupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('run_order_backup', function (Blueprint $table) {
            $table->enum('is_heading',['No','Yes'])->after('type')->default('No');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('run_order_backup', function (Blueprint $table) {
            //
        });
    }
}
