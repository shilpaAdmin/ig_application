<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppBasicPages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_basic_pages', function (Blueprint $table) {
            $table->id();
            $table->enum('app',['English','Gujarati','JustIn'])->default('English');
            $table->enum('page_name',['Terms & Condition','Privacy Policy','Code For Newsroom','About Us'])->default('Terms & Condition');
            $table->text('description')->nullable();
			$table->enum('status',['Active','Inactive','Delete'])->default('Active');
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
        Schema::dropIfExists('app_basic_pages');
    }
}
