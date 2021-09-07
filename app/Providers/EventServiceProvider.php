<?php

namespace App\Providers;

use App\Events\CheckClientEmailEvent;
use App\Events\ClientAuthSuccessEvent;
use App\Events\ClientHasLoggedInEvent;
use App\Events\ClientHasRegisteredEvent;
use App\Events\OrderAnswerUploadEvent;
use App\Events\OrderRegisteredEvent;
use App\Events\WriterCommitsOrderFilesEvent;
use App\Listeners\AuthClientListener;
use App\Listeners\CheckClientEmailListener;
use App\Listeners\CreateOrderListener;
use App\Listeners\StoreFilesListener;
use App\Listeners\WriterOrderFilesListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ClientHasRegisteredEvent::class => [
            CreateOrderListener::class,
        ],
        OrderRegisteredEvent::class => [
            StoreFilesListener::class,
        ],
        ClientHasLoggedInEvent::class => [
            AuthClientListener::class,
        ],
        ClientAuthSuccessEvent::class => [
            CreateOrderListener::class,
        ],
        OrderAnswerUploadEvent::class => [
            StoreFilesListener::class,
        ],
        CheckClientEmailEvent::class =>[
            CheckClientEmailListener::class,
        ],
        WriterCommitsOrderFilesEvent::class =>[
            WriterOrderFilesListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}