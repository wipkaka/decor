<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SanPham;
class DanhMuc extends Model
{
    use HasFactory;
    protected $table = 'danhmuc';
    public function sanpham()
    {
        return $this->hasMany(SanPham::class,'idDanhmuc','id');
    }
}
