<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('id_images');
            $table->string('type')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('route');
            $table->string('title')->nullable();
            $table->string('type'); //Cases, portfolios, testimonials, users, about, home
            $table->string('id_parent')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
		
		Schema::create('cases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('id_images');
            $table->text('html');
            $table->string('tags');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('portfolios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('id_images');
            $table->text('html');
            $table->string('tags');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('testimonials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('author');
            $table->string('id_images');
            $table->text('bio');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('images');
        Schema::dropIfExists('cases');
        Schema::dropIfExists('portfolios');
        Schema::dropIfExists('testimonials');
    }
}
