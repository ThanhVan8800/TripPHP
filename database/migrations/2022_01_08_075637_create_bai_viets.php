<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaiViets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bai_viets', function (Blueprint $table) {
            $table->id();
            $table->string('ten_bai_viet',255);
            $table->datetime('ngay_dang');
            $table->foreignId('user_id');
            $table->string('noi_dung');
            $table->integer('luot_like');
            $table->string('hinh_anh');
            $table->integer('trang_thai');
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
        Schema::dropIfExists('bai_viet');
    }
}
