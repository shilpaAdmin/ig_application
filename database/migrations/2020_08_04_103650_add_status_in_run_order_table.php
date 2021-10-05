<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusInRunOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('run_order', function (Blueprint $table) {
            $table->enum('status',['Active','InActive'])->after('approved_by');
            $table->integer('created_by')->nullable()->after('status');
            $table->integer('updated_by')->nullable()->after('created_by');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('run_order', function (Blueprint $table) {
            //
        });
    }
}
