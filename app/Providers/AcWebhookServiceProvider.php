<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ActiveCampaign\Webhooks;

class AcWebhookServiceProvider extends ServiceProvider
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
        app()->bind('WebhookContact', Webhooks\WebhookContact::class);
    }
}
