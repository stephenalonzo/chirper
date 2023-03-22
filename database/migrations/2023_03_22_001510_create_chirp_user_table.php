<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chirp_user', function (Blueprint $table) {
            $table->unsignedBigInteger('chirp_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('chirp_id')->references('id')->on('chirps')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chirp_user');
    }
};
