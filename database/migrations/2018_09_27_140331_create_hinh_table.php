<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hinh', function (Blueprint $table) {
            $table->unsignedSmallInteger('ma')->autoIncrement()->comment('mã hinh sản phẩm');
            $table->unsignedBigInteger('nha_ma')->comment('sản phẩm mã khóa ngoại');
            $table->unsignedTinyInteger('stt')->default('1')->comment('hình sản phẩm');
            $table->string('ten',150)->comment('hình ảnh tên');

            $table->foreign('nha_ma')->references('ma')->on('nha')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hinh');
    }
}
