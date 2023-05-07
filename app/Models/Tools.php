<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tools extends Model
{
    use HasFactory;

    protected $table = 'tools';
    protected $primary = 'id';
    protected $fillable = [
        'title',
        'image',
        'qty',
        'status',
    ];
}
