<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DanhMuc;
class SanPham extends Model
{
    use HasFactory;
    protected $table = 'sanpham';
    public function danhmuc()
    {
        return $this->belongsTo(DanhMuc::class,'idDanhmuc','id');
    }
}
