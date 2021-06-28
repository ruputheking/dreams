<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('summary')->nullable();
            $table->longText('details');
            $table->integer('view_count')->default(0);
            $table->longText('seo_meta_keywords')->nullable();
            $table->longText('seo_meta_description')->nullable();
            $table->timestamps();
        });

        Schema::create('notice_comments', function (Blueprint $table) {
            $table->id();
            $table->integer('notice_id');
            $table->integer('notice_comment_id')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->longText('comments');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('notices');
        Schema::dropIfExists('notice_comments');
    }
}
