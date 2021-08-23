<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\DanhMuc;
use App\Models\TinTuc;
use App\Models\Slides;
use App\Models\Config;
use App\Models\Store;
use Illuminate\Support\Facades\DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $danhmuc = DanhMuc::all();
        $slide = Slides::all();
        $config = DB::table('config')->first();
        $store = Store::all();
        $tintuc = TinTuc::orderBy('updated_at','DESC')->take(3)->get();
        view()->share(['danhmuc'=>$danhmuc,'tintuc'=>$tintuc,'config'=>$config, 'store'=>$store]);
    }
}
