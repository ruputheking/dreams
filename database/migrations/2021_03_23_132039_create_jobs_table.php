<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('title');
            $table->string('salary');
            $table->string('location');
            $table->longText('summary');
            $table->date('deadline');
            $table->decimal('candidate', 10, 2)->nullable();
            $table->longText('details');
            $table->longText('seo_meta_keywords')->nullable();
            $table->longText('seo_meta_description')->nullable();
            $table->integer('view_count')->default(0);
            $table->integer('status')->default(0);
            $table->timestamps();
        });

        Schema::create('job_candidates', function (Blueprint $table) {
            $table->id();
            $table->integer('job_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('gender');
            $table->string('address');
            $table->string('qualification');
            $table->date('birthday');
            $table->string('message');
            $table->string('previous_job')->nullable();
            $table->string('experience')->nullable();
            $table->string('attachment');
            $table->string('photo');
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
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('job_candidates');
    }
}
