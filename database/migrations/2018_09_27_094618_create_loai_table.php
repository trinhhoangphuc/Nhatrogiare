<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loai', function (Blueprint $table) {
            $table->unsignedTinyInteger('ma')->autoIncrement()->comment('Mã loại phòng');
            $table->string('ten', 150)->uniqued()->comment('Tên lọa phòng');
            $table->unsignedTinyInteger('trangthai')->default('1')->comment('hiển thị');
            $table->timestamp('taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('loại tạo mới');
            $table->timestamp('capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('loại cập nhật');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loai');
    }
}
