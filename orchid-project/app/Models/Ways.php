<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Ways extends Model
{
    use AsSource, HasFactory;
    protected $table = 'ways';

    protected $fillable = [
        'items'
    ];

    protected $casts = [
        'items' => 'array'
    ];
}
