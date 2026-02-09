<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Screen\AsSource;

class Works extends Model
{
    use AsSource, Attachable, HasFactory;

    protected $table = 'works';

    protected $fillable = [
        'name',
        'type',
        'preview',
        'categories',
        'link'
    ];

    protected $casts = [
        'preview' => 'array',
        'categories' => 'array'
    ];
}
