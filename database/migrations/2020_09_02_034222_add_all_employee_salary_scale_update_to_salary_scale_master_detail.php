<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAllEmployeeSalaryScaleUpdateToSalaryScaleMasterDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salary_scale_master_detail', function (Blueprint $table) {
            $table->enum('all_employee_salary_scale_update',['Yes','No'])->default('No')->nullable()->after('value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salary_scale_master_detail', function (Blueprint $table) {
            //
        });
    }
}
