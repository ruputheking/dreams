<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('host')->nullable();
            $table->string('location');
            $table->timestamp('starting_date')->nullable();
            $table->timestamp('ending_date')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->longText('details');
            $table->longText('quote')->nullable();
            $table->string('file_1');
            $table->string('file_2');
            $table->string('file_3');
            $table->string('file_4')->nullable();
            $table->string('file_5')->nullable();
            $table->string('file_6')->nullable();
            $table->longText('seo_meta_keywords')->nullable();
            $table->longText('seo_meta_description')->nullable();
            $table->integer('status')->default(0);
            $table->integer('view_count')->default(0);
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
        Schema::dropIfExists('events');
    }
}
