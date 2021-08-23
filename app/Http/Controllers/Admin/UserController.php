<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use MicrosoftAzure\Storage\Common\Internal\Validate;

class UserController extends Controller
{
    public function getUser(){
        $user = User::all();
        return view('admin.pages.user.user',compact('user'));
    }
    public function postThem(Request $request){
        $this->validate($request,
        [
            'fullname' =>'required|min:2|max:20',
            'name' => 'required|min:5|max:20|unique:users,name',
            'pass' => 'required|min:8',
        ],
        [
            'fullname.required' => 'Tên không được để trống',
            'fullname.min' => 'Tên tối thiểu 2 kí tự',
            'fullname.max' => 'Tên tối đa 20 kí tự',
            'name.required' => 'Tài khoản không được để trống',
            'name.min' => 'Tài khoản tối thiểu 5 kí tự',
            'name.max' => 'Tài khoản tối đa 20 kí tự',
            'pass.required' => 'Mật khẩu không được để trống',
            'pass.min' => 'Mật khẩu tối thiểu 8 kí tự'
        ]);
        $user = new User;
        $user->fullname = $request->fullname;
        $user->name = $request->name;
        $user->password = bcrypt($request->pass);
        $user->save();
        return response()->json(['code'=>200,'message'=>'Thêm thành công','data'=>$user],200);
    }   
    public function postXoa($id)
    {
        $user = User::find($id);
        if($user->quyen == 1)
        {
            return response()->json(['code'=>100,'message'=>'Không thể xóa tài khoản Admin'],200);
        }
        else{
            $user->delete();
            return response()->json(['code'=>200,'message'=>'Xóa thành công'],200);
        }
    }
    public function getSua($id)
    {
        $user = User::find($id);
        return response()->json(['data'=>$user],200);
    }
    public function postSua(Request $request, $id)
    {
        $this->validate($request,
        [
            'efullname' =>'required|min:2|max:20',
        ],
        [
            'efullname.required' => 'Tên không được để trống',
            'efullname.min' => 'Tên tối thiểu 2 kí tự',
            'efullname.max' => 'Tên tối đa 20 kí tự'
        ]);
        $user = User::find($id);
        $user->fullname = $request->efullname;
        $user->quyen = $request->equyen;
        if($request->changepassword == "on")
        {
                $this->validate($request,
            [
                'epass' => 'required|min:8',
            ],
            [
                'epass.required' => 'Mật khẩu không được để trống',
                'epass.min' => 'Mật khẩu tối thiểu 8 kí tự',
            ]);
            if(Hash::check($request->epass, $user->password))
            {
                return response()->json(['code'=>100,'message'=>'Bạn đã nhập mật khẩu cũ'],200);
            }
            else
            {
                $user->password = bcrypt($request->epass);
            }
        }
        $user->save();
        return response()->json(['code'=>200,'message'=>'Sửa thành công','data'=>$user],200);
    }
    public function getlogin(){
        if(Auth::check())
        {
            return redirect('admin/dashboard');
        }
        else{
            return view('admin.pages.user.login');
        }
    }
    public function postlogin(Request $request){
        $this->validate($request,
        [
            'name' => 'required',
            'password' => 'required',
        ],
        [
            'name.required' => 'Tài khoản không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
        ]);
        if(Auth::attempt(['name' => $request->name, 'password' => $request->password]))
        {
            return redirect('admin/dashboard');
        }
        else
        {
            return redirect()->back()->with('thongbao','Tài khoản hoặc mật khẩu không đúng');
        }
    }
    public function getlogout(){
        Auth::logout();
        return redirect('admin/login');
    }
}
