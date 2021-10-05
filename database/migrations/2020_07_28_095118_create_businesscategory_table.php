<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinesscategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesscategory', function (Blueprint $table) {
            $table->id();
            $table->string('businesscategoryTitle')->nullable();
            $table->text('businesscategoryDesc')->nullable();
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
        Schema::dropIfExists('businesscategory');
    }
}
