<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Contact extends Model
{
    use AsSource, HasFactory;

    protected $table = 'contact';

    protected $fillable = [
        'title',
        'email',
        'company',
        'register',
        'van',
        'address',
        'address_link',
        'phone',
        'footer_title',
        'copyright'
    ];
}