<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donvitinh extends Model
{
    use HasFactory;

    protected $table = "donvitinh";
    public $timestamps = false;

    public function sanpham(){
        return $this->hasMany('App\Models\donvitinh','MaDVT','MaDVT');
    }

    public function vebuffet(){
        return $this->hasMany('App\Models\donvitinh','MaDVT','MaDVT');
    }

    public function mon(){
        return $this->hasMany('App\Models\donvitinh','MaDVT','MaDVT');
    }
}
