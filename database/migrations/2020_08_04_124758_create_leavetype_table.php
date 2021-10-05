<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavetypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leavetype', function (Blueprint $table) {
            $table->id();
			$table->string('leavetypeTitle')->nullable();
			$table->string('leavetypeName')->nullable();
			$table->string('leavetypeEligible')->nullable();
			$table->enum('leavetypeCaryforward', ['Yes', 'No']);
			$table->enum('leavetypeCredit', ['Yearly', 'Half Yearly', 'Quarterly', 'Monthly']);
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
        Schema::dropIfExists('leavetype');
    }
}
