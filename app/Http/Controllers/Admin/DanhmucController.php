<?php

namespace App\Http\Controllers\Admin;
use App\Models\DanhMuc;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use response;
use App\http\Requests;
class DanhmucController extends Controller
{
    public function getDanhmuc(){
        $danhmuc = DanhMuc::all();
        return view('admin.pages.danhmuc.danhmuc',compact('danhmuc'));
    }
    public function postThem(Request $req){
            $this->validate($req,
            [
                'name' => 'required|min:10|max:255|unique:danhmuc,name'
            ],
            [
                'name.required' => 'Bạn chưa nhập tên danh mục',
                'name.min'  => 'Tên danh mục tối thiểu 10 kí tự',
                'name.max' => 'Tên danh mục tối đa 255 kí tự',
                'name.unique' => 'Tên danh mục đã tồn tại'
            ]
            );
            $danhmuc = new DanhMuc;
            $danhmuc->name = $req->name;
            $danhmuc->TenKhongDau = changeTitle($req->name);
            $danhmuc->save();
            return response()->json(['code'=>200, 'message'=>'Thêm thành công','data'=>$danhmuc,200]);
    }
    public function getSua($id){
        $danhmuc = DanhMuc::find($id);
        return response()->json(['data'=>$danhmuc], 200);
    }
    public function postSua(Request $req, $id){
        $validator = $req->validate(
        [
            'name' => 'required|min:10|max:256|unique:danhmuc,name'
        ],
        [
            'name.required' => 'Bạn chưa nhập tên danh mục',
            'name.min'  => 'Tên danh mục tối thiểu 10 kí tự',
            'name.max' => 'Tên danh mục tối đa 256 kí tự',
            'name.unique' => 'Tên danh mục đã tồn tại'
        ]
        );
            $danhmuc = DanhMuc::find($id);
            $danhmuc->name = $req->name;
            $danhmuc->TenKhongDau = changeTitle($req->name);
            $danhmuc->save();
            return response()->json(['code'=>200, 'message'=>'Sửa thành công','data'=>$danhmuc,200]);
    }
    public function postXoa($id){
        $danhmuc = DanhMuc::find($id);
        if(count($danhmuc->sanpham->all()) >0 )
        {
            return response()->json(['code'=>100, 'message'=>'Bạn phải xóa các sản phẩm thuộc danh mục này trước'], 200);
        }
        else
        {
            $danhmuc->delete();
            return response()->json(['code'=>200,'message'=>'Xóa thành công'], 200);
        }
    }
}
