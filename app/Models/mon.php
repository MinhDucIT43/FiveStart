<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mon extends Model
{
    use HasFactory;

    protected $table = "mon";
    public $timestamps = false;

    public function nhommon(){
        return $this->belongsTo('App\Models\nhommon','MaNM','MaMon');
    }

    public function donvitinh(){
        return $this->belongsTo('App\Models\donvitinh','MaDVT','MaMon');
    }
}
