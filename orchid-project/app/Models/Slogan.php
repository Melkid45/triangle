<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Screen\AsSource;

class Slogan extends Model
{
    use AsSource, Attachable, HasFactory;
    protected $table = 'slogan';
    protected $fillable = [
        'description',
        'items'
    ];
    protected $casts = [
        'items' => 'array'
    ];
}
