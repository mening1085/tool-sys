<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTool extends Model
{
    use HasFactory;

    protected $table = 'user_tool';
    protected $primary = 'id';
    protected $fillable = [
        'user_id',
        'tool_id',
    ];
}
