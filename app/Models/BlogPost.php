<?php

namespace App\Models;

use App\Events\BlogPostCreated;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;
    //Allows mass assignments when making a blogPost POST req
    protected $fillable = [
        'message',
    ];

    protected $dispatchesEvents = [
        'created' => BlogPostCreated::class,
    ];

    //
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}