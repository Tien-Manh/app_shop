<?php

namespace App\Providers;

use App\Barner;
use App\Categories;
use App\Products;
use function foo\func;
use http\Env\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        view()->composer('layout.sidebar-admin', function($view){
            $cate = Categories::all();
            $view->with('cate', $cate);
        });
        view()->composer('layout.layout-fontend.nav-view', function($view){
            $nav = Categories::where('cate_active', 0)->where('parent_id', 0)->offset(0)->limit(4)->get();
            $subnav = Categories::where('cate_active', 0)->where('parent_id', '>', 0)->get();
            $view->with(['nav' => $nav, 'subnav' => $subnav]);
        });
        view()->composer('layout.layout-fontend.barner-view', function($view){
            $baner =  DB::table('baner_active')->join('baner_details', 'baner_active.baner_id', '=', 'baner_details.id')
                ->where('baner_active.active', 1)->first();
            $view->with('baner', $baner);
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
