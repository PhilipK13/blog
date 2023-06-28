<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;
    //Allows mass assignments when making a blogPost POST req
    protected $fillable = [
        'message',
    ];

}