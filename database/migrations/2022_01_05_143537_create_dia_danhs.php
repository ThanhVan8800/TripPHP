<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiaDanhs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dia_danhs', function (Blueprint $table) {
            $table->id();
            $table->string('ten_dia_danh');
            $table->dateTime('ngay_dang');
            $table->string('vi_do');
            $table->string('kinh_do');
            $table->string('mo_ta');
            $table->integer('trang_thai');
            $table->foreignId('post_id');
            $table->foreignId('user_id');
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
        Schema::dropIfExists('dia_danh');
    }
}
