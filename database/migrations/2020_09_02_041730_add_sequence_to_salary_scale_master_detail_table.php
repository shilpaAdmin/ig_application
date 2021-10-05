<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSequenceToSalaryScaleMasterDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salary_scale_master_detail', function (Blueprint $table) {
            $table->integer('sequence')->nullable()->after('all_employee_salary_scale_update');
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
