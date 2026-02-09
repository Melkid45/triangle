<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Facts extends Model
{
    use AsSource, HasFactory;
    protected $table = 'facts';

    protected $fillable = [
        'title',
        'soft_title',
        'description',
        'items'
    ];
    protected $casts = [
        'items' => 'array'
    ];
}
