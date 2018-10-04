<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loai extends Model {
    public    $timestamps   = false;

    protected $table        = 'loai';
    protected $fillable     = ['ten', 'trangthai', 'taoMoi', 'capNhat'];
    protected $guarded      = ['ma'];

    protected $primaryKey   = 'ma';

    protected $dates        = ['taoMoi', 'capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}