<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use DB;
use View;
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
		//echo 'inside always route chnage';
        Schema::defaultStringLength(191);

        $subCategoryData = DB::table('category')->where('parent_category_id',0)->where('redirect_status',0)->get();
        // dd($mediaLibraryMasterData);

		View::composer('layouts.sidebar', function($view) use($subCategoryData)
		{
			$view->with('subCategoryData',$subCategoryData);
		});




    }
}
