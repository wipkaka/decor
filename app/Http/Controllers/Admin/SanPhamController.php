<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SanPhamController extends Controller
{   
    public function getSanpham(){
        $sanpham = SanPham::all();
        return view('admin.pages.sanpham.danhsach',compact('sanpham'));
    }
    public function postThem(Request $request){
        $this->validate($request,
        [
            'name' => 'required|min:10|max:255|unique:sanpham,name',
            'tomtat' => 'required',
            'noidung' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ],
        [
            'name.required' => 'Bạn chưa nhập tên sản phẩm. ',
            'name.min'  => 'Tên danh mục tối thiểu 10 kí tự. ',
            'name.max' => 'Tên danh mục tối đa 255 kí tự. ',
            'name.unique' => 'Tên danh mục đã tồn tại. ',
            'tomtat.required'=> 'Tóm tắt không được bỏ trống. ',
            'noidung.required'=> 'Nội dung không được bỏ trống. ',
            'image.required' => 'Bạn chưa chọn file ảnh. ',
            'image.image' => 'File đã chọn không phải là hình ảnh. ',
            'image.mimes' => 'File đã chọn phải có định dạng là png, jpg, jpeg. ',

        ]);
        $sanpham = new SanPham;
        $sanpham->idDanhmuc = $request->dm;
        $sanpham->name = $request->name;
        $sanpham->tomtat = $request->tomtat;
        $sanpham->noidung = $request->noidung;
        $sanpham->view = 0;
        if($request->hasFile("image"))
        {
            $file = $request->file('image');
            $name  = $file->getClientOriginalName();   
            $hinh = Str::random(4)."_".$name;
            while(file_exists("upload/sp/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            $file->move('upload/sp/',$hinh);
            $sanpham->hinh = $hinh;     
        }
        if($request->new == "on")
        {
            $sanpham->new = 1;
        }
        $danhmuc = DanhMuc::find($request->dm);
        $sanpham->save();
        return response()->json(['code'=>200,'message'=>'Thêm thành công','data'=>$sanpham,'dm'=>$danhmuc],200);
    }
    public function postXoa($id){
        $sanpham = SanPham::find($id);
        unlink(public_path('upload/sp/'.$sanpham->hinh));
        $sanpham->delete();
        return response()->json(['message'=>'Xóa thành công'],200);
    }
    public function getSua($id)
    {
        $sanpham = SanPham::find($id);
        return response()->json(['data'=>$sanpham], 200);
    }
    public function postSua(Request $request, $id){
        $sanpham = SanPham::find($id);
        if($request->ename  == $sanpham->name)
        {
            $this->validate($request,
            [
                'ename' => 'required|min:10|max:255',
                'etomtat' => 'required',
                'enoidung' => 'required',
            ],
            [
                'ename.required' => 'Bạn chưa nhập tên sản phẩm. ',
                'ename.min'  => 'Tên sản phẩm tối thiểu 10 kí tự. ',
                'ename.max' => 'Tên sản phẩm tối đa 255 kí tự. ',
                'etomtat.required'=> 'Tóm tắt không được bỏ trống. ',
                'enoidung.required'=> 'Nội dung không được bỏ trống. ',

            ]);
        } 
        else
        {
            $this->validate($request,
            [
                'ename' => 'required|min:10|max:255|unique:sanpham,name',
                'etomtat' => 'required',
                'enoidung' => 'required',
            ],
            [
                'ename.required' => 'Bạn chưa nhập tên sản phẩm. ',
                'ename.min'  => 'Tên sản phẩm tối thiểu 10 kí tự. ',
                'ename.max' => 'Tên sản phẩm tối đa 255 kí tự. ',
                'ename.unique' => 'Tên sản phẩm đã tồn tại. ',
                'etomtat.required'=> 'Tóm tắt không được bỏ trống. ',
                'enoidung.required'=> 'Nội dung không được bỏ trống. ',
    
            ]);
        }
        if($request->hasFile('eimage'))
        {
            $this->validate($request,
            [
                'eimage' => 'required|image|mimes:png,jpg,jpeg',
            ],
            [
                'eimage.image' => 'File đã chọn không phải là hình ảnh. ',
                'eimage.mimes' => 'File đã chọn phải có định dạng là png, jpg, jpeg. ',
            ]);
            $file = $request->file('eimage');
            $name  = $file->getClientOriginalName();   
            $hinh = Str::random(4)."_".$name;
            while(file_exists("upload/sp/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            unlink(public_path('upload/sp/'.$sanpham->hinh));
            $file->move('upload/sp/',$hinh);
            $sanpham->hinh = $hinh;
            $sanpham->idDanhmuc = $request->edm;
            $sanpham->name = $request->ename;
            $sanpham->tomtat = $request->etomtat;
            $sanpham->noidung = $request->enoidung;
            if($request->enew == "on")
            {
                $sanpham->new = 1;
            }
            $danhmuc = DanhMuc::find($request->edm);
            $sanpham->save();
            return response()->json(['code'=>200,'message'=>'Sửa thành công','data'=>$sanpham,'dm'=>$danhmuc],200);
        }
        else
        {
            $sanpham->hinh = $sanpham->hinh;
            $sanpham->idDanhmuc = $request->edm;
            $sanpham->name = $request->ename;
            $sanpham->tomtat = $request->etomtat;
            $sanpham->noidung = $request->enoidung;
            if($request->enew == "on")
            {
                $sanpham->new = 1;
            }
            else
            {
                $sanpham->new = 0;
            }
            $danhmuc = DanhMuc::find($request->edm);
            $sanpham->save();
            return response()->json(['code'=>200,'message'=>'Sửa thành công','data'=>$sanpham,'dm'=>$danhmuc],200);
        }
    }
}

