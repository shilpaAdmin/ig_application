<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageTimelineHistoryGujaratiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manage_timeline_history_gujarati', function (Blueprint $table) {
            $table->id();
			$table->date('timeline_date')->nullable();
			 $table->text('stories')->nullable();
			 $table->integer('timeline')->nullable();
			 $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('manage_timeline_history_gujarati');
    }
}
