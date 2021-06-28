<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->longText('summary');
            $table->integer('category_id');
            $table->decimal('price', 10, 0)->nullable();
            $table->longText('description');
            $table->timestamp('starting_date')->nullable();
            $table->string('schedule')->nullable();
            $table->time('starting_time')->nullable();
            $table->time('ending_time')->nullable();
            $table->string('duration')->nullable();
            $table->string('total_credit')->nullable();
            $table->integer('max_student')->nullable();
            $table->string('feature_image')->nullable();
            $table->integer('view_count')->default(0);
            $table->longText('seo_meta_keywords')->nullable();
            $table->longText('seo_meta_description')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });

        Schema::create('course_comments', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id');
            $table->integer('comment_id')->nullable();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->longText('comments');
            $table->integer('status')->default(0);
            $table->timestamps();
        });

        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->integer('author_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone',20);
            $table->date('birthday');
            $table->string('gender',20);
            $table->string('religion',20);
            $table->date('joining_date');
            $table->text('address')->nullable();
            $table->string('photo')->nullable();
            $table->string('facebook')->default('#');
            $table->string('instagram')->default('#');
            $table->string('twitter')->default('#');
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
        Schema::dropIfExists('courses');
        Schema::dropIfExists('course_comments');
        Schema::dropIfExists('teachers');
    }
}
