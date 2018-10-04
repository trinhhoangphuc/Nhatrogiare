<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hinh extends Model {
    public    $timestamps   = false;

    protected $table        = 'hinh';
    protected $fillable     = ['nha_ma', 'stt', 'ten'];
    protected $guarded      = ['ma'];

    protected $primaryKey   = 'ma';}