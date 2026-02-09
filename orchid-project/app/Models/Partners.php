<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Screen\AsSource;

class Partners extends Model
{
    use AsSource, Attachable, HasFactory;
    
    protected $table = 'partners';

    protected $fillable = [
        'partner'
    ];

    protected $casts = [
        'partner' => 'array'
    ];
}
