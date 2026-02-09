<?php

namespace App\Models;

use App\Models\Concerns\HasSeoData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Screen\AsSource;

class About extends Model
{
    use AsSource, HasFactory, Attachable, HasSeoData;
    protected $table = 'about';
    protected $fillable = [
        'title',
        'images',
    ];
    protected $casts = [
        'images' => 'array'
    ];
}
