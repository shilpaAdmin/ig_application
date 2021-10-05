<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_module', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('module')->nullable();
            $table->enum('view', ['false', 'true']);
            $table->enum('add', ['false', 'true']);
            $table->enum('edit', ['false', 'true']);
            $table->enum('status', ['false', 'true']);
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
        Schema::dropIfExists('user_module');
    }
}
