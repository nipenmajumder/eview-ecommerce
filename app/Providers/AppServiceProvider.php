<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\CompanyInformation;
use App\Models\Social;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {

    }

    public function boot()
    {
        $maincate = Category::with(['subCategory',
            'subCategory.reSubCategory',
            'subCategory.reSubCategory.reReSubCategory',
            'subCategory.reSubCategory.reReSubCategory.reReReSubCategory',
        ])->isActive()->isDeleted()->get();

        // dd($maincate);

        $companyInformation = CompanyInformation::first();
        $icon               = Social::select(['facebook', 'twitter', 'linkend', 'youtube', 'skype', 'google_plus', 'feed'])->first();
        $today              = Carbon::now()->format('d');
        $eleven             = '17';
        $twenty_two         = '17';

        view()->share('companyInformation', $companyInformation);
        view()->share('maincate', $maincate);
        view()->share('icon', $icon);
        view()->share('today', $today);
        view()->share('eleven', $eleven);
        view()->share('twenty_two', $twenty_two);

        Paginator::useBootstrap();
    }
}
