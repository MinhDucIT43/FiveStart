<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhanvien extends Model
{
    use HasFactory;

    protected $table = "nhanvien";
    public $timestamps = false;

    public function chucvu(){
        return $this->belongsTo('App\Models\chucvu','MaCV','TenDangNhap');
    }
}
