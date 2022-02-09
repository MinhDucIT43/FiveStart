<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    use HasFactory;

    protected $table = "sanpham";
    public $timestamps = false;

    public function loaisanpham(){
        return $this->belongsTo('App\Models\loaisanpham','MaLSP','MaSP');
    }

    public function donvitinh(){
        return $this->belongsTo('App\Models\donvitinh','MaDVT','MaSP');
    }
}
