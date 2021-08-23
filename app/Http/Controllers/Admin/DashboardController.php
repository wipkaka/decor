<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;  
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;  
class DashboardController extends Controller
{
    public function admin(){
        if(Auth::check())
        {
            return redirect('admin/dashboard');
        }
        else{
            return redirect()->back();
        }
    }
    public function dashboard(){
        $sanpham = DB::table('sanpham')->orderBy('view','DESC')->get(['view','name']);
        return view('admin.pages.dashboard',compact('sanpham'));
    }
    public function index(Request $request)
    {
        $sanpham = DB::table('sanpham')->orderBy('view','DESC')->get(['view','name']);
        if($request->ajax())
    	{
    		$data = Event::whereDate('start', '>=', $request->start)
                       ->get(['id', 'title', 'start']);
            return response()->json($data);
    	}
    	return view('admin.pages.dashboard',compact('sanpham'));
    }
    public function add(Request $request){
        $event = new Event;
        $event->title = $request->title;
        $event->start =	$request->start;
        $event->save();
        return response()->json($event);
    }
    public function delete(Request $request){
        $event = Event::find($request->id);
        $event->delete();
        return response()->json($event);
    }
    public function update(Request $request){
        $event = Event::find($request->id);
        $event->title = $request->title;
        $event->start =	$request->start;
        $event->save();
        return response()->json($event);
    }
}
