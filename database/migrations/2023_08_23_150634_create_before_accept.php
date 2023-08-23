<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('before_accept', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('home_id')->unsigned();
            $table->foreign('home_id')->references('id')->on('homes');
            $table->BigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->BigInteger('hostuser_id')->unsigned();
            $table->foreign('hostuser_id')->references('id')->on('users');
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->integer('total_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('before_accept');
    }
};
