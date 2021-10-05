<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicePayNowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_pay_now', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id')->nullable();
            $table->date('transaction_date')->nullable();
            $table->double('amount', 8, 2)->nullable();
            $table->string('custom_file')->nullable();
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
        Schema::dropIfExists('invoice_pay_now');
    }
}
