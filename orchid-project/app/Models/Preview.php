<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Preview extends Model
{

    use AsSource, HasFactory;
    protected $table = 'preview';
    protected $fillable = [
        'column1',
        'column2',
        'column3',
    ];
    protected $casts = [
        'column1' => 'array',
        'column2' => 'array',
        'column3' => 'array',
    ];

    public function getWorks1Attribute()
    {
        if (!$this->column1 || empty($this->column1)) {
            return collect();
        }
        return Works::whereIn('id', $this->column1)->get();
    }

    public function getWorks2Attribute()
    {
        if (!$this->column2 || empty($this->column2)) {
            return collect();
        }
        return Works::whereIn('id', $this->column2)->get();
    }

    public function getWorks3Attribute()
    {
        if (!$this->column3 || empty($this->column3)) {
            return collect();
        }
        return Works::whereIn('id', $this->column3)->get();
    }
}
