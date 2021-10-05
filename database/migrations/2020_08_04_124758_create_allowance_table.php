<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllowanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allowance', function (Blueprint $table) {
            $table->id();
			$table->string('allowanceTitle')->nullable();
			$table->enum('allowanceType', ['Earning', 'Deduction']);
			$table->enum('allowanceTaxable', ['Yes', 'No']);
			$table->enum('allowanceApplyon', ['Basic Salary', 'Gross Salary']);
			$table->enum('status', ['Active', 'InActive']);
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
        Schema::dropIfExists('allowance');
    }
}
