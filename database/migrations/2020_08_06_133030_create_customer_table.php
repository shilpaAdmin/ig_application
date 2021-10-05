<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('company_contact')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('pan')->nullable();
            $table->string('tan')->nullable();
            $table->string('gst_no')->nullable();
            $table->string('website')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('near_by')->nullable();
            $table->string('area')->nullable();
            $table->integer('city')->nullable();
            $table->integer('country')->nullable();
            $table->enum('status',['Active','InActive'])->default('Active');
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
        Schema::dropIfExists('customer');
    }
}
