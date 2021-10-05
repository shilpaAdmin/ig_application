<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTagsInStoryUploadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('story_upload', function (Blueprint $table) {
            $table->string('tag')->nullable()->after('document_type');
            $table->string('created_by')->nullable()->after('tag');
            $table->string('updated_by')->nullable()->after('created_by');
            $table->enum('status',['Active','InActive'])->nullable()->after('updated_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('story_upload', function (Blueprint $table) {
            //
        });
    }
}
