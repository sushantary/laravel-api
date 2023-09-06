<?php

namespace App\Subscribers;

use App\Events\Models\Posts\PostCreated;
use App\Events\Models\Posts\PostDeleted;
use App\Events\Models\Posts\PostUpdated;
use App\Events\Models\Users\UserCreated;
use App\Events\Models\Users\UserUpdated;
use App\Listeners\SendWelcomeEmail;
use Illuminate\Events\Dispatcher;

class PostSubscriber
{
    public function subscribe(Dispatcher $events)
    {
        $events->listen(PostCreated::class, SendWelcomeEmail::class);
        $events->listen(PostUpdated::class,SendWelcomeEmail::class);
        $events->listen(PostDeleted::class,SendWelcomeEmail::class);

    }
}
