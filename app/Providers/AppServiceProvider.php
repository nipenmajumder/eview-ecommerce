<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\CompanyInformation;
use App\Models\Seo;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
       
    }


    public function boot()
    {
        $maincate=Category::where('is_deleted',0)->where('is_active',1)->get();
        $companyInformation=CompanyInformation::first();
        view()->share('companyInformation', $companyInformation);
        view()->share('maincate', $maincate);
    }
}
