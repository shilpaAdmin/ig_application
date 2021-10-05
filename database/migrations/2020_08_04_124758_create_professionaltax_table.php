<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionaltaxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professionaltax', function (Blueprint $table) {
            $table->id();
			$table->string('professionaltaxSrange')->nullable();
			$table->string('professionaltaxErange')->nullable();
			$table->decimal('professionaltaxAmount', 8, 2);
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
        Schema::dropIfExists('professionaltax');
    }
}
