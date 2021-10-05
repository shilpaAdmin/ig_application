<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();
            $table->string('area')->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('cheque_name')->nullable();
            $table->string('company_pan')->nullable();
            $table->string('company_gst')->nullable();
            $table->string('company_email')->nullable();
            $table->integer('company_contact')->nullable();
            $table->string('notes')->nullable();
            $table->string('business_category')->nullable();
            $table->string('product_services')->nullable();
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
        Schema::dropIfExists('vendor');
    }
}
