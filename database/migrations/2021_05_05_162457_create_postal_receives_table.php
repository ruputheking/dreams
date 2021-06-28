<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostalReceivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postal_receives', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('to_title');
            $table->string('address')->nullable();
            $table->string('note')->nullable();
            $table->string('from_title');
            $table->date('date');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('postal_receives');
    }
}
