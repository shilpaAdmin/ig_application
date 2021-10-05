<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceVendorPayNowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_vendor_pay_now', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_vendor_id')->nullable();
            $table->string('payment_mode')->nullable();
            $table->string('bank_name')->nullable();
            $table->integer('acc_no')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('transaction_date')->nullable();
            $table->integer('amount')->nullable();
            $table->string('receipt_file')->nullable();
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
        Schema::dropIfExists('invoice_vendor_pay_now');
    }
}
