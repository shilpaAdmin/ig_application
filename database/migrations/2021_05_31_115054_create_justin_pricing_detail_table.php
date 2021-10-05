<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJustinPricingDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('justin_pricing_detail', function (Blueprint $table) {
            $table->id();
			$table->integer('just_in_timeline_justin_id');
			$table->string('name')->nullable();
			$table->string('price')->nullable();
			$table->enum('color', ['green', 'red']);
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
        Schema::dropIfExists('justin_pricing_detail');
    }
}
