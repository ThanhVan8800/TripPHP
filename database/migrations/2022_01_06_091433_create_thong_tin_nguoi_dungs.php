<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThongTinNguoiDungs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thong_tin_nguoi_dungs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('tt_ten');
            $table->string('tt_dia_chi');
            $table->integer('tt_sdt');
            $table->string('tt_email');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thong_tin_nguoi_dung');
    }
}
