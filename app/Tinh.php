<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tinh extends Model {
    public    $timestamps   = false;

    protected $table        = 'tinh';
    protected $fillable     = ['ten', 'trangthai', 'taoMoi', 'capNhat'];
    protected $guarded      = ['ma'];

    protected $primaryKey   = 'ma';

    protected $dates        = ['taoMoi', 'capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}