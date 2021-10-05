<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContent1InBreakingNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('breaking_news', function (Blueprint $table) {
            $table->string('content1')->nullable()->after('content');
            $table->string('content2')->nullable()->after('content1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('breaking_news', function (Blueprint $table) {
            //
        });
    }
}
