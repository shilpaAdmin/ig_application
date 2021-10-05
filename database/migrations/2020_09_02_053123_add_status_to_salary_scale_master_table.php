<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToSalaryScaleMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salary_scale_master', function (Blueprint $table) {
            $table->enum('save_status',['Yes','No'])->default('No')->nullable()->after('salaryFor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salary_scale_master', function (Blueprint $table) {
            //
        });
    }
}
