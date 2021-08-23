<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slides;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use PhpParser\Node\Expr\FuncCall;
class SlideController extends Controller
{
    public function getSlides(){
        $slide = Slides::all();
        return view('admin.pages.slide.slide',compact('slide'));
    }
    // public function getThem(){
    //     return view('admin.pages.slide.them');
    // }
    public function postThem(Request $request){
        $this->validate($request,
        [
            'link' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ],
        [
            'link.required' => 'Bạn chưa điền link slide',
            'image.required' => 'Bạn chưa chọn file ảnh',
            'image.image' => 'File đã chọn không phải là hình ảnh',
            'image.mimes' => 'File đã chọn phải có định dạng là png, jpg, jpeg',
        ]);
        $slide = new Slides;
        if($request->hasfile("image")){
            $file = $request->file("image");
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("upload/slide/".$hinh))
            {
                $hinh = Str::random(4)."_".$name;
            }
            $file->move('upload/slide',$hinh);
            $slide->hinh = $hinh;
        }
        $slide->link = $request->link;
        $slide->save();
        return response()->json(['code'=>200,'data'=>$slide,'message'=>'Thêm thành công'], 200);
    }
    public function postXoa($id){
        $slide = Slides::find($id);
        unlink(public_path('upload/slide/'.$slide->hinh));
        $slide->delete();
        return response()->json(['message'=>'Xóa thành công'],200);
    }
    public function getSua($id){
        $slide = Slides::find($id);
        return response()->json(['data'=>$slide], 200);
    }
    public function postsua(Request $request, $id){
        $slide = Slides::find($id);
        $this->validate($request,
        [
            'edit_link' => 'required',
        ],
        [
            'edit_link.required' => 'Bạn chưa điền link slide',
        ]);
        if($request->hasFile("edit_image")){
            $request->validate(
            [
                'edit_image' => 'image|mimes:png,jpg,jpeg',
            ],
            [
                'edit_image.image' => 'File đã chọn không phải là hình ảnh',
                'edit_image.mimes' => 'File đã chọn phải có định dạng là png, jpg, jpeg',
            ]);
            $file = $request->file("edit_image");
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("upload/slide/".$hinh))
            {
                $hinh = Str::random(4)."_".$name;
            }
            $file->move("upload/slide",$hinh);
            unlink(public_path('upload/slide/'.$slide->hinh));
            $slide->hinh = $hinh;
            $slide->link = $request->edit_link;
            $slide->save();
            return response()->json(['code'=>200, 'message'=>'Sửa thành công','data'=>$slide], 200);
        }
        else{
            $slide->hinh = $slide->hinh;
            $slide->link = $request->edit_link;
            $slide->save();
            return response()->json(['code'=>200,'message'=>'Sửa thành công','data'=>$slide], 200);
        }
    }
}

