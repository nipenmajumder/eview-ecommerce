<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\CompanyInformation;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {

    }

    public function boot()
    {
        $maincate           = Category::where('is_deleted', 0)->where('is_active', 1)->get();
        $companyInformation = CompanyInformation::first();
        view()->share('companyInformation', $companyInformation);
        view()->share('maincate', $maincate);
        Paginator::useBootstrap();
    }
}
