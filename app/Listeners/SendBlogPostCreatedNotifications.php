<?php

namespace App\Listeners;

use App\Events\BlogPostCreated;
use App\Models\User;
use App\Notifications\NewBlogPost;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendBlogPostCreatedNotifications implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BlogPostCreated $event): void
    {
        foreach (User::whereNot('id', $event->blogPost->user_id)->cursor() as $user) {
            $user->notify(new NewBlogPost($event->blogPost));
        }
    }
}