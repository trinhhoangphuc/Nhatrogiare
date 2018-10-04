<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nha', function (Blueprint $table) {
            $table->unsignedBigInteger('ma')->autoIncrement()->comment('mã phòng');
            $table->string('tieude', 500)->comment('tiêu đề');
            $table->text('mota')->comment('mô tả');
            $table->unsignedBigInteger('gia')->comment('giá phòng');
            $table->unsignedTinyInteger('dientich')->comment('mã vị trí');
            $table->unsignedSmallInteger('luotxem')->comment('lượt xem');
            $table->string('diachi', 500)->comment('địa chỉ');
            $table->string('dienthoai', 20)->comment('địện thoại');
            $table->string('lat', 150)->comment('tọa độ x');
            $table->string('lng', 150)->comment('tọa độ y');
            $table->string('hinh', 250)->comment('hình ảnh');
            $table->unsignedInteger('user_ma')->comment('mã user');
            $table->unsignedTinyInteger('loai_ma')->comment('mã loại');
            $table->unsignedTinyInteger('tinh_ma')->comment('mã tỉnh');
            $table->unsignedBigInteger('trangthai')->comment('duyệt');
            $table->timestamp('taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('loại tạo mới');
            $table->timestamp('capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('loại cập nhật');

            $table->foreign('user_ma')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('loai_ma')->references('ma')->on('loai')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tinh_ma')->references('ma')->on('tinh')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nha');
    }
}
