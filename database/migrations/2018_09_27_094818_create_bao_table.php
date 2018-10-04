<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baocao', function (Blueprint $table) {
            $table->increments('ma')->comment('ma reporrs');
            $table->unsignedBigInteger('nha_ma')->comment('ma phong');
            $table->string('ip', 250)->comment('IP');
            $table->integer('trangthai')->comment('trang thai');
            $table->timestamp('taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('loại tạo mới');
            $table->timestamp('capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('loại cập nhật');

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
        Schema::dropIfExists('baocao');
    }
}
