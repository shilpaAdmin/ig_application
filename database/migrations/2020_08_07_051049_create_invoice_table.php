<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id')->nullable();
            $table->string('invoice_no')->nullable();
            $table->date('invoice_date')->nullable();
            $table->date('due_date')->nullable();
            $table->string('product_service')->nullable();
            $table->double('price',8, 2)->nullable();
            $table->double('unit',8, 2)->nullable();
            $table->double('total',8, 2)->nullable();
            $table->double('gst',8, 2)->nullable();
            $table->double('discount',8, 2)->nullable();
            $table->double('tds',8, 2)->nullable();
            $table->double('net_amount',8, 2)->nullable();
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
        Schema::dropIfExists('invoice');
    }
}
