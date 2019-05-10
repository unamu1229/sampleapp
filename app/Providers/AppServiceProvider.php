<?php

namespace App\Providers;

use App\DataProvider\AddReviewIndexProviderInterface;
use App\DataProvider\Elasticsearch\AddReviewIndexDataProvider;
use App\Foundation\ElasticsearchClient;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use App\DataProvider\RegisterReviewProviderInterface;
use App\DataProvider\Database\RegisterReviewDataProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(RegisterReviewProviderInterface::class, function () {
            return $this->app->make(RegisterReviewDataProvider::class);
            // return new RegisterReviewDataProvider();
        });

        $this->app->singleton(ElasticsearchClient::class, function () {
           $config = $this->app['config']->get('elasticsearch');
           Log::debug($config['hosts']);
           return new ElasticsearchClient($config['hosts']);
        });

        $this->app->bind(AddReviewIndexProviderInterface::class, function () {
            return $this->app->make(AddReviewIndexDataProvider::class);
        });
    }
}
