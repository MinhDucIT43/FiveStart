<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loaisanpham extends Model
{
    use HasFactory;

    protected $table = "loaisanpham";
    public $timestamps = false;

    public function sanpham(){
        return $this->hasMany('App\Models\loaisanpham','MaLSP','MaLSP');
    }
}
