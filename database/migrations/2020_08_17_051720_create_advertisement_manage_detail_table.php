<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementManageDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisement_manage_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('advertisement_manage_id')->nullable();
            $table->integer('timeline_id')->nullable();
            $table->integer('slot_id')->nullable();
            $table->integer('cost')->nullable();
            $table->string('start')->nullable();
            $table->string('end')->nullable();
            $table->integer('no_of_days')->nullable();
            $table->integer('total')->nullable();
            $table->string('media_file')->nullable();
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
        Schema::dropIfExists('advertisement_manage_detail');
    }
}
