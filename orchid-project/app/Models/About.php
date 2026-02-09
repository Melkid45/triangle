<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Screen\AsSource;

class About extends Model
{
    use AsSource, HasFactory, Attachable;
    protected $table = 'about';
    protected $fillable = [
        'title',
        'images',
    ];
    protected $casts = [
        'images' => 'array'
    ];
}
