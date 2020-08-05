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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('surname')->nullable();
            $table->string('firstname')->nullable();
            $table->string('email')->unique()->nullable();
            $table->longText('address')->nullable();
            $table->string('phone')->nullable();
            $table->date('dob')->nullable();
            $table->integer('code')->nullable();
            $table->string('account_number')->unique()->nullable();
            $table->boolean('is_verified')->default(false);
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            // $table->rememberToken();
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
    }
}
