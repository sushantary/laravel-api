<?php

namespace App\Subscribers;

use App\Events\Models\Users\UserCreated;
use App\Events\Models\Users\UserDeleted;
use App\Events\Models\Users\UserUpdated;
use App\Listeners\SendWelcomeEmail;
use Illuminate\Events\Dispatcher;

class UserSubscriber
{
    public function subscribe(Dispatcher $events)
    {
        $events->listen(UserCreated::class,SendWelcomeEmail::class);
        $events->listen(UserUpdated::class,SendWelcomeEmail::class);
        $events->listen(UserDeleted::class,SendWelcomeEmail::class);

    }
}
