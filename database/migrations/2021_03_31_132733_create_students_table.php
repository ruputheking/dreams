<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('author_id');
            $table->integer('parent_id')->nullable();
            $table->string('student_name');
            $table->date('birthday');
            $table->string('gender',10);
            $table->string('blood_group',4)->nullable();
            $table->string('religion',20);
            $table->string('phone',20);
            $table->string('citizenship_no')->unique()->nullable();
            $table->string('passport', 50)->nullable();
            $table->string('photo')->nullable();
            $table->text('address')->nullable();
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('students');
    }
}
