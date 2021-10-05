<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCubeDetailGujaratiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cube_detail_gujarati', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('logo')->nullable();
            $table->string('description')->nullable();
			$table->string('color_code')->nullable();
            $table->integer('added_by')->default(0);
            $table->integer('updated_by')->default(0);
			$table->enum('status',['Active','InActive','Delete'])->default('Active');
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
        Schema::dropIfExists('cube_detail_gujarati');
    }
}
