<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankmasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bankmaster', function (Blueprint $table) {
            $table->id();
            $table->string('bankName')->nullable();
            $table->string('branchName')->nullable();
            $table->string('accountNo')->nullable();
            $table->string('ifscCode')->nullable();
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
        Schema::dropIfExists('bankmaster');
    }
}
