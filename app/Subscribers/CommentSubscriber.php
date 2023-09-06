<?php

namespace App\Subscribers;

use App\Events\Models\Comments\CommentCreated;
use App\Events\Models\Comments\CommentDeleted;
use App\Events\Models\Comments\CommentUpdated;
use App\Events\Models\Users\UserCreated;
use App\Events\Models\Users\UserUpdated;
use App\Listeners\SendWelcomeEmail;
use Illuminate\Events\Dispatcher;

class CommentSubscriber
{
    public function subscribe(Dispatcher $events)
    {
        $events->listen(CommentCreated::class,SendWelcomeEmail::class);
        $events->listen(CommentUpdated::class,SendWelcomeEmail::class);
        $events->listen(CommentDeleted::class,SendWelcomeEmail::class);

    }
}
