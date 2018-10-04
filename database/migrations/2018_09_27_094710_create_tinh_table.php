<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tinh', function (Blueprint $table) {
            $table->unsignedTinyInteger('ma')->autoIncrement()->comment('Mã tinh phòng');
            $table->string('ten', 150)->uniqued()->comment('Tên lọa phòng');
            $table->unsignedTinyInteger('trangthai')->default('1')->comment('hiển thị');
            $table->timestamp('taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('tinh tạo mới');
            $table->timestamp('capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('tinh cập nhật');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tinh');
    }
}
