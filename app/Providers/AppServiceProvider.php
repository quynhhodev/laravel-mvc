<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Product;

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
        Paginator::useBootstrap();
        view()->share('path', '/'); # HoNgocQuynh/public/
        $womenProducts = Product::where('status', '>', 0)->orderby('created_at', 'DESC')->limit(8)->get();
        view()->share('womenProduct', $womenProducts);
    }
}
