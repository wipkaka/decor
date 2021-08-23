<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Store;
class ConfigController extends Controller
{
    public function getConfig(){
        $cfg = DB::table('config')->first();
        return view('admin.pages.config.config',compact('cfg'));
    }
    public function postConfig(Request $request){
        $this->validate($request,
        [
            'phone'=> 'required|min:10',
            'email' => 'required|email',
            'address' => 'required',
            'logo' => 'required',
        ],
        [
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.min' => 'Số điện thoại không hợp lệ',
            'email.required' => 'Email không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
            'logo.required' => 'Link logo không được để trống',
        ]);
        $cfg = Config::first();
        $cfg->phone = $request->phone;
        $cfg->email = $request->email;
        $cfg->address = $request->address;
        $cfg->logo = $request->logo;
        $cfg->save();
        return response()->json(['code'=>200, 'message' => 'Sửa thành công','data'=>$cfg],200);
    }
    public function getStore(){
        $store = Store::all();
        return view('admin.pages.config.store',compact('store'));
    }
    public function postAdd(Request $request)
    {
        $this->validate($request,
        [
            'phone'=> 'required|min:10',
            'address' => 'required',
            'ggmap' => 'required',
        ],
        [
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.min' => 'Số điện thoại không hợp lệ',
            'address.required' => 'Địa chỉ không được để trống',
            'ggmap.required' => 'Link Google Map không được để trống',
        ]);
        $str = new Store;
        $str->phone = $request->phone;
        $str->address = $request->address;
        $str->ggmap = $request->ggmap;
        $str->save();
        return response()->json(['code'=>200, 'message' => 'Thêm thành công','data'=>$str],200);
    }
    public function deleteStr($id)
    {
        $str = Store::find($id);
        $str->delete(); 
        return response()->json(['message' => 'Xóa thành công'],200);
    }
    public function getEdit($id)
    {
        $str = Store::find($id);
        return response()->json(['code'=>200,'data'=>$str],200);
    }
    public function postEdit(Request $request, $id)
    {
        $this->validate($request,
        [
            'ephone'=> 'required|min:10',
            'eaddress' => 'required',
            'eggmap' => 'required',
        ],
        [
            'ephone.required' => 'Số điện thoại không được để trống',
            'ephone.min' => 'Số điện thoại không hợp lệ',
            'eaddress.required' => 'Địa chỉ không được để trống',
            'eggmap.required' => 'Link Google Map không được để trống',
        ]);
        $str = Store::find($id);
        $str->phone = $request->ephone;
        $str->address = $request->eaddress;
        $str->ggmap = $request->eggmap;
        $str->save();
        return response()->json(['code'=>200, 'message' => 'Sửa thành công','data'=>$str],200);
    }
}
