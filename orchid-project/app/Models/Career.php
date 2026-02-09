<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Screen\AsSource;

class Career extends Model
{
    use AsSource, Attachable, HasFactory;

    protected $table = 'career';

    protected $fillable = [
        'type',
        'name',
        'poster',
        'employment',
        'role',
        'location',
        'date',
        'job',
        'summary_description',
        'responsibilities',
        'qualifications',
        'perks_description',
        'perks_list',
        'common_description',
        'payment',
        'days',
        'hours',
        'experience'
    ];

    protected $casts = [
        'poster' => 'array',
        'responsibilities' => 'array',
        'qualifications' => 'array',
        'perks_list' => 'array',
    ];
}
