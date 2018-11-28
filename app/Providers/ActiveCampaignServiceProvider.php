<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ActiveCampaign\Activities;

class ActiveCampaignServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind('AcContact', Activities\AcContact::class);
        app()->bind('AcDeal', Activities\AcDeal::class);
        app()->bind('AcList', Activities\AcList::class);
    }
}
