<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baocao extends Model {
    public    $timestamps   = false;

    protected $table        = 'cusc_baocao';
    protected $fillable     = ['nha_ma', 'ip', 'trangthai', 'taoMoi', 'capNhat'];
    protected $guarded      = ['ma'];

    protected $primaryKey   = 'ma';

    protected $dates        = ['taoMoi', 'capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}