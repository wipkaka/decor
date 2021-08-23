<?php

namespace App\Http\Controllers\Admin;
use App\Models\TinTuc;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class NewsController extends Controller
{
    public function getNews(){
        $tintuc = TinTuc::all();
        return view('admin.pages.tintuc.tintuc',compact('tintuc'));
    }
    public function postThem(Request $request){
        $this->validate($request,
        [
            'tieude'=> 'required|min:10|max:255|unique:tintuc,tieude',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'tomtat' => 'required',
            'noidung' => 'required',
        ],
        [
            'tieude.required' => 'Bạn chưa nhập tiêu đề',
            'tieude.min'  => 'Tiêu đề tối thiểu 10 kí tự',
            'tieude.max' => 'Tiêu đề tối đa 256 kí tự',
            'tieude.unique' => 'Tiêu đề đã tồn tại',
            'image.required' => 'Bạn chưa chọn file ảnh',
            'image.image' => 'File đã chọn không phải là hình ảnh',
            'image.mimes' => 'File đã chọn phải có định dạng là png, jpg, jpeg',
            'tomtat.required'=> 'Tóm tắt không được bỏ trống',
            'noidung.required'=> 'Tóm tắt không được bỏ trống',
        ]);
        $tintuc = new TinTuc;
        $tintuc->tieude = $request->tieude;
        $tintuc->tomtat = $request->tomtat;
        $tintuc->noidung = $request->noidung;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("upload/tintuc/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            $file->move('upload/tintuc/',$hinh);
            $tintuc->hinh = $hinh;
        }
        $tintuc->save();
        return response()->json(['code'=>200,'message'=>'Thêm thành công','data'=>$tintuc],200);
    }
    public function postXoa($id){
        $tintuc = Tintuc::find($id);
        unlink(public_path('upload/tintuc/'.$tintuc->hinh));
        $tintuc->delete();
        return response()->json(['message'=>'Xóa thành công'],200);
    }
    public function getSua($id){
        $tintuc = TinTuc::find($id);
        return response()->json(['data'=>$tintuc], 200);
    }
    public function postSua(Request $request, $id)
    {
        $tintuc = TinTuc::find($id);
        $this->validate($request,
        [
            'etieude'=> 'required|min:10|max:255',
            'etomtat' => 'required',
            'enoidung' => 'required',
        ],
        [
            'etieude.required' => 'Bạn chưa nhập tiêu đề',
            'etieude.min'  => 'Tiêu đề tối thiểu 10 kí tự',
            'etieude.max' => 'Tiêu đề tối đa 256 kí tự',
            'etomtat.required'=> 'Tóm tắt không được bỏ trống',
            'enoidung.required'=> 'Nội dung không được bỏ trống',
        ]);
        if($request->hasFile('eimage')){
            $this->validate($request,
            [
                'eimage' => 'required|image|mimes:png,jpg,jpeg',
            ],
            [
                'eimage.required' => 'Bạn chưa chọn file ảnh',
                'eimage.image' => 'File đã chọn không phải là hình ảnh',
                'eimage.mimes' => 'File đã chọn phải có định dạng là png, jpg, jpeg',
            ]); 
            $file = $request->file("eimage");
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("upload/tintuc/".$hinh))
            {
                $hinh = Str::random(4)."_".$name;
            }
            $file->move("upload/tintuc",$hinh);
            unlink(public_path('upload/tintuc/'.$tintuc->hinh));
            $tintuc->hinh = $hinh;
            $tintuc->tieude = $request->etieude;
            $tintuc->tomtat = $request->etomtat;
            $tintuc->noidung = $request->enoidung;
            $tintuc->save();
            return response()->json(['code'=>200, 'message'=>'Sửa thành công','data'=>$tintuc], 200); 
        }
        else{
            $tintuc->hinh = $tintuc->hinh;
            $tintuc->tieude = $request->etieude;
            $tintuc->tomtat = $request->etomtat;
            $tintuc->noidung = $request->enoidung;
            $tintuc->save();
            return response()->json(['code'=>200, 'message'=>'Sửa thành công','data'=>$tintuc], 200); 
        }
    }
}
