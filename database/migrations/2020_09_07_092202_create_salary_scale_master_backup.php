<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryScaleMasterBackup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_scale_master_backup', function (Blueprint $table) {
            $table->id();
            $table->integer('salary_scale_master_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('allowance_id')->nullable();
            $table->string('taxable')->nullable();
            $table->string('apply_on')->nullable();
            $table->string('remaining_of_gross')->nullable();
            $table->string('value_in')->nullable();
            $table->integer('value')->nullable();
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
        Schema::dropIfExists('salary_scale_master_backup');
    }
}
