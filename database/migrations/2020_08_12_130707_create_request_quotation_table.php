<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestQuotationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_quotation', function (Blueprint $table) {
            $table->id();
            $table->integer('vendor_id')->nullable();
            $table->string('requestfor')->nullable();
            $table->string('short_description')->nullable();
            $table->string('description')->nullable();
            $table->string('rfq_date')->nullable();
            $table->string('last_date')->nullable();
            $table->enum('status',['Active','InActive'])->nullable();
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
        Schema::dropIfExists('request_quotation');
    }
}
