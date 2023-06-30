<?php

namespace App\Notifications;

use App\Models\BlogPost;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Str;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewBlogPost extends Notification
{
    use Queueable;

    /**
     * Create a new instance of a blog post notification
     */
    public function __construct(public BlogPost $blogPost)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("New Post from {$this->blogPost->user->name}")
            ->greeting("New Post from {$this->blogPost->user->name}")
            ->line(Str::limit($this->blogPost->message, 50))
            ->action('Go to the site', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}