<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Faq extends Model
{
    use AsSource, HasFactory;
    protected $table = 'faq';

    protected $fillable = [
        'title',
        'items'
    ];
    protected $casts = [
        'items' => 'array'
    ];
}
