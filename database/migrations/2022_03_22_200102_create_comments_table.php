<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('settings.database_table.comments'), function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->text('content');
            $table->string('author');

            $table->foreign('post_id')->references('id')->on(config('settings.database_table.posts'));
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
        Schema::dropIfExists(config('settings.database_table.comments'));
    }
}
