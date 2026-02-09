<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Hero extends Model
{
    use AsSource, HasFactory;
    protected $table = 'hero';

    protected $fillable = [
        'title',
        'description',
        'soft_title'
    ];
}
