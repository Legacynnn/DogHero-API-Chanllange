<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Walker extends Model
{
    use HasFactory;
    protected $table = 'walkers';
    protected $fillable = [
        'name',
        'age',
        'timeForPass'
    ];
}
