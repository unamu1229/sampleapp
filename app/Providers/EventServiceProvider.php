<?php

namespace App\Providers;

use App\Events\PublishProcessor;
use App\Events\ReviewRegistered;
use App\Listeners\MessageQueueSubscriber;
use App\Listeners\MessageSubscriber;
use App\Listeners\ReviewIndexCreator;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
        ReviewRegistered::class => [
            ReviewIndexCreator::class
        ],
        PublishProcessor::class => [
            MessageSubscriber::class,
            MessageQueueSubscriber::class
        ],
        'App\Events\PreUserChange' => [
            'App\Listeners\UserChangeLog'
        ],
        'Package\Event\Job\CreatedJob' => [
            'App\Listeners\AddCorpJob'
        ],
        'Package\Domain\User\ChangeGender' => [
            'App\Listeners\ChangeEntryBilling'
        ],
        'App\Events\CorpUpdated' => [
            'App\Listeners\InvoiceContact'
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
