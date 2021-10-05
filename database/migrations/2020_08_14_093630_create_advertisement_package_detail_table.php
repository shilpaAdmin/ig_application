<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementPackageDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisement_package_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('advertisement_package_id')->nullable();
            $table->integer('timeline_id')->nullable();
            $table->integer('slot_id')->nullable();
            $table->string('prime')->nullable();
            $table->integer('cost')->nullable();
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
        Schema::dropIfExists('advertisement_package_detail');
    }
}
