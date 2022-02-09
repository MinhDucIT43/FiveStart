<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhommon extends Model
{
    use HasFactory;

    protected $table = "nhom_mon";
    public $timestamps = false;

    public function mon(){
        return $this->hasMany('App\Models\nhommon','MaNM','MaNM');
    }
}
