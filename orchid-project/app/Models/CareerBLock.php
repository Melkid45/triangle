<?php

namespace App\Models;

use App\Models\Concerns\HasSeoData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class CareerBLock extends Model
{
    use AsSource, HasFactory, HasSeoData;

    protected $table = 'career-block';

    protected $fillable = [
        'title'
    ];
}
