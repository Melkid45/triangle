<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class WorkBLock extends Model
{
    use AsSource, HasFactory;

    protected $table = 'work-block';
    protected $fillable = [
        'title'
    ];
}
