<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class CareerBLock extends Model
{
    use AsSource, HasFactory;

    protected $table = 'career-block';

    protected $fillable = [
        'title'
    ];
}
