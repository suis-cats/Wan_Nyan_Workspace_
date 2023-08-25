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
        Schema::table('before_accept', function (Blueprint $table) {
            //
            $table->dropForeign(['home_id']);
            $table->dropColumn('home_id');
            $table->BigInteger('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('before_accept', function (Blueprint $table) {
            $table->dropForeign(['post_id']);

            // post_id カラムを削除
            $table->dropColumn('post_id');

            // home_id カラムとその外部キー制約を追加
            $table->BigInteger('home_id')->unsigned();
            $table->foreign('home_id')->references('id')->on('homes');
        });
    }
};
