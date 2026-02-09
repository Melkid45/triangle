<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use App\Models\Concerns\HasSeoData;

class Hero extends Model
{
    use AsSource, HasFactory, HasSeoData;
    protected $table = 'hero';

    protected $fillable = [
        'title',
        'description',
        'soft_title'
    ];
}
