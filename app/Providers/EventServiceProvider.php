<?php

namespace App\Providers;

use App\Events\Models\Users\UserCreated;
use App\Listeners\SendWelcomeEmail;
use App\Subscribers\CommentSubscriber;
use App\Subscribers\PostSubscriber;
use App\Subscribers\UserSubscriber;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
//        UserCreated::class=>[
//        SendWelcomeEmail::class,
//        ]
    ];

    protected $subscribe=[
        UserSubscriber::class,
        CommentSubscriber::class,
        PostSubscriber::class,

    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
