<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('name2')->nullable()->change();
            $table->string('name1')->nullable()->change();
            $table->string('kana2')->nullable()->change();
            $table->string('kana1')->nullable()->change();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedInteger('typ');         
            $table->boolean('delete')->nullable()->change();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('typ')->references('id')->on('user_typ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
