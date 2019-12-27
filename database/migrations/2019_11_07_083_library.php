<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Library extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::dropIfExists('library');
        Schema::create('library', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->bigInteger('isbn');
            $table->integer('stock');
            $table->boolean('delet');
            $table->date('s_date');
            $table->datetime('updated_at');
            $table->datetime('created_at');
            $table->string('title', 255)->nullable()->default('');
            $table->string('kana', 255)->nullable()->default('');
            $table->string('auth', 100)->nullable()->default('');
            $table->unsignedInteger('genre');
            $table->unsignedInteger('publ');
        });
        
        Schema::table('library', function (Blueprint $table) {
            
            $table->foreign('genre')->references('id')->on('books_genre');
            $table->foreign('publ')->references('id')->on('books_publ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('library');
    }
}
