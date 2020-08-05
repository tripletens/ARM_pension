<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noks', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('NOK_surname')->nullable();
            $table->string('NOK_firstname')->nullable();
            $table->longText('NOK_address')->nullable();
            $table->string('NOK_mobile_number')->nullable();
            $table->string('NOK_email')->nullable();
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
        Schema::dropIfExists('noks');
    }
}
