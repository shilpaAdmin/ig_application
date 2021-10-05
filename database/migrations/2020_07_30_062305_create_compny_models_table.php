<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompnyModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companys', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('short_code')->nullable();
            $table->text('logo')->nullable();
            $table->text('address_line_1')->nullable();
            $table->text('address_line_2')->nullable();
            $table->string('near_by')->nullable();
            $table->string('area')->nullable();
            $table->string('contry')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('primary_email')->nullable();
            $table->string('alternate_email')->nullable();
            $table->double('primary_contact_no')->nullable();
            $table->double('alternate_contact_no')->nullable();
            $table->string('official_website')->nullable();
            $table->string('employer_contribution')->nullable();
            $table->string('company_pf_no')->nullable();
            $table->string('company_esi_no')->nullable();
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
        Schema::dropIfExists('companys');
    }
}
