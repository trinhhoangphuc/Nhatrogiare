<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nha extends Model {
    public    $timestamps   = false;

    protected $table        = 'nha';
    protected $fillable     = ['tieude', 'mota', 'gia', 'dientich', 'luotxem', 'diachi', 'dienthoai', 'lat', 'lng', 'hinh', 'user_ma', 'loai_ma', 'tinh_ma', 'trangthai', 'taoMoi', 'capNhat'];
    protected $guarded      = ['ma'];

    protected $primaryKey   = 'ma';

    protected $dates        = ['taoMoi', 'capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}