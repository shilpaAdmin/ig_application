<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorBankDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_bank_detail', function (Blueprint $table) {
            $table->id();
            $table->string('bankname')->nullable();
            $table->string('bankaddress')->nullable();
            $table->string('accountno')->nullable();
            $table->string('ifsccode')->nullable();
            $table->string('otherpayment')->nullable();
            $table->string('customFile')->nullable();
            $table->string('referance')->nullable();
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
        Schema::dropIfExists('vendor_bank_detail');
    }
}
