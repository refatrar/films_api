<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->string('release', 150);
            $table->date('date');
            $table->enum('rating', ['1','2','3','4','5'])->default('1');
            $table->enum('ticket', ['Available', 'Not Available'])->default('Available');
            $table->double('price', 7,2);
            $table->unsignedBigInteger('country');
            $table->string('genre');
            $table->string('photo');

            $table->foreign('country')->references('id')->on('countries')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films');
    }
}
