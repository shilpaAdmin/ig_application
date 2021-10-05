<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryscalemasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaryscalemaster', function (Blueprint $table) {
            $table->id();
			$table->string('company')->nullable();
			$table->string('allowance')->nullable();
			$table->string('basicsalary')->nullable();
			$table->enum('SaleryFor', ['Employee Specific', 'Employer Specific']);
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
        Schema::dropIfExists('salaryscalemaster');
    }
}
