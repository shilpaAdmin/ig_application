<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCreatedByAssignStoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assign_story', function (Blueprint $table) {
            $table->integer('created_by')->nullable()->after('time');
            $table->integer('updated_by')->nullable()->after('created_by');
            $table->enum('status',['Active','InActive'])->default('Active')->after('updated_by');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
