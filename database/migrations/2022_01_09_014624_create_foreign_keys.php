<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //1
        Schema::table('vung_miens', function (Blueprint $table) {
            //$table->unsignedBigInteger('dia_danh_id');
            $table->foreign('dia_danh_id')->references('id')->on('dia_danhs');
        });
        //2
        Schema::table('nhu_caus', function(Blueprint $table){
            //$table->unsignedBigInteger('dia_danh_id');
            $table->foreign('dia_danh_id')->references('id')->on('dia_danhs');
        });
        //3
        Schema::table('hinh_anhs', function(Blueprint $table){
           // $table->unsignedBigInteger('bai_viet_id');
            //$table->unsignedBigInteger('dia_danh_id');
            $table->foreign('dia_danh_id')->references('id')->on('dia_danhs');
            $table->foreign('bai_viet_id')->references('id')->on('bai_viets');
            //$table->foreign('dia_danh_id')->constrained('dia_danh');
            //$table->foreign('bai_viet_id')->constrained('bai_viet');
        });
        //4
        // chưa tạo bảng
        Schema::table('dia_danhs', function(Blueprint $table){
            //$table->unsignedBigInteger('bai_viet_id');
            //$table->unsignedBigInteger('user_id');
            $table->foreign('bai_viet_id')->references('id')->on('bai_viets');
            $table->foreign('user_id')->references('id')->on('users');
            //$table->foreign('danh_muc_id')->constrained('danh_muc');
        });
        //5
        Schema::table('dislikes', function(Blueprint $table){
            //$table->unsignedBigInteger('bai_viet_id');
            //$table->unsignedBigInteger('user_id');
            $table->foreign('bai_viet_id')->references('id')->on('bai_viets');
            $table->foreign('user_id')->references('id')->on('users');
        });
        //6
        Schema::table('likes', function(Blueprint $table){
            //$table->unsignedBigInteger('bai_viet_id');
           // $table->unsignedBigInteger('user_id');
            $table->foreign('bai_viet_id')->references('id')->on('bai_viets');
            $table->foreign('user_id')->references('id')->on('users');
        });
        //7
        Schema::table('danh_gias', function(Blueprint $table){
            //$table->unsignedBigInteger('bai_viet_id');
            //$table->unsignedBigInteger('user_id');
            $table->foreign('bai_viet_id')->references('id')->on('bai_viets');
            $table->foreign('user_id')->references('id')->on('users');
        });
        //8
        Schema::table('binh_luans', function(Blueprint $table){
            //$table->unsignedBigInteger('bai_viet_id');
            //$table->unsignedBigInteger('user_id');
            $table->foreign('bai_viet_id')->references('id')->on('bai_viets');
            $table->foreign('user_id')->references('id')->on('users');
        });
        //9
        Schema::table('bai_viets', function(Blueprint $table){
            //$table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
        //10
        Schema::table('luot_xems', function(Blueprint $table){
            //$table->unsignedBigInteger('user_id');
            //$table->unsignedBigInteger('bai_viet_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('bai_viet_id')->references('id')->on('bai_viets');
        });
        //11
        Schema::table('thong_tin_nguoi_dungs', function(Blueprint $table){
            //$table->unsignedBigInteger('user_id');
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
        Schema::table('vung_miens', function (Blueprint $table) {
            //
        });
    }
}
