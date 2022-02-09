<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chucvu extends Model
{
    use HasFactory;

    protected $table = "chucvu";
    public $timestamps = false;

    public function nhanvien(){
        return $this->hasMany('App\Models\chucvu','MaCV','MaCV');
    }
}
