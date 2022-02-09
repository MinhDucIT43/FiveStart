<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vebuffet extends Model
{
    use HasFactory;

    protected $table = "vebuffet";
    public $timestamps = false;

    public function donvitinh(){
        return $this->belongsTo('App\Models\donvitinh','MaDVT','MaVe');
    }
}
