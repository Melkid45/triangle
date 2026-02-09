<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Categories extends Model
{
    use AsSource, HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'name'
    ];
}
