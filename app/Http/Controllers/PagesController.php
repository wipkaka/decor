<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slides;
use App\Models\DanhMuc;
use App\Models\FeedBack;
use App\Models\TinTuc;
use App\Models\SanPham;
use Illuminate\Support\Facades\DB;
class PagesController extends Controller
{
    public function trangchu()
    {
        $slide = Slides::all();
        $popsanpham = DB::table('sanpham')->orderBy('view','DESC')->take(6)->get();
        $newsanpham = DB::table('sanpham')->where('new',1)->paginate(6);
        return view('pages.trangchu',compact('slide','popsanpham','newsanpham'));
    }
    public function sanpham(){
        $sanpham = SanPham::all();
        $name = 'TÂT CẢ SẢN PHẨM';
        return view('pages.sanpham',compact('sanpham','name'));
    }
    public function sanphamtype($tenkhongdau)
    {
        $danhmuc = DB::table('danhmuc')->where('TenKhongDau',$tenkhongdau)->get(['id','name'])->first();
        $sanpham = SanPham::where('idDanhmuc',$danhmuc->id)->get();
        $name = $danhmuc->name;
        return view('pages.sanpham',compact('sanpham','name')); 
    }
    public function detail($tensanpham){
        $sanpham = DB::table('sanpham')->where('name',$tensanpham)->get()->first();
        $sp = SanPham::find($sanpham->id);     
        $sp->view ++;
        $sp->save();
        $resanpham = DB::table('sanpham')->where('idDanhmuc',$sanpham->idDanhmuc)->where('name','!=',$sanpham->name)->limit(3)->get();
        return view('pages.chitiet',compact('sanpham','resanpham'));
    }
    public function tintuc(){
        $tintuc = TinTuc::all();
        return view('pages.tintuc',compact('tintuc'));
    }
    public function ttdetail($tieude)
    {
        $tt = DB::table('tintuc')->where('tieude',$tieude)->get()->first();
        $tinkhac = DB::table('tintuc')->where('tieude','!=',$tt->tieude)->limit(3)->get();
        return view('pages.tintucdetail',compact('tt','tinkhac'));
    }
    public function gioithieu(){
        return view('pages.gioithieu');
    }
    public function chinhsach(){
        return view('pages.chinhsach');
    }
    public function lienhe(){
        return view('pages.lienhe');
    }
    public function search(Request $request){
        if($request->s == '')
        {
            $sanpham = SanPham::all();
            $name = 'TẤT CẢ SẢN PHẨM';
        }
        else
        {
            $sanpham = SanPham::where('name','LIKE',"%$request->s%")->orWhere('tomtat','LIKE',"%$request->s%")->orWhere('noidung','LIKE',"%$request->s%")->get();
            if(count($sanpham) > 0)
            {
                $name = 'Kết quả tìm kiếm cho:'.$request->s;
            }
            else
            {
                $name = 'Không tìm thấy kết quả cho:'.$request->s;
            }
        }
        return view('pages.sanpham',compact('sanpham','name'));
    }
    public function feedback(Request $request){
        $this->validate($request,
        [
            'name' => 'required|max:25',
            'phone' => 'required||digits:10',
            'content' => 'required',
        ],
        [
            'name.required' => 'Bạn chưa nhập tên. ',
            'name.max' => 'Tên tối đa 25 kí tự. ',
            'phone.required'=> 'Số điện thoại không được bỏ trống. ',
            'phone.digits'=> 'Số điện thoại không hợp lệ. ',
            'content.required' => 'Chưa nhập nội dung. ',

        ]);
        $fb = new FeedBack;
        $fb->name = $request->name;
        $fb->phone = $request->phone;
        $fb->content = $request->content;
        $fb->save();
        return response()->json(['message'=> 'Gửi thành công'],200);
    }
}

