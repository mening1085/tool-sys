<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTool extends Model
{
    use HasFactory;

    protected $table = 'user_tool';
    protected $primary = 'id';
    protected $with = ['tool', 'user'];
    protected $fillable = [
        'user_id',
        'tool_id',
        'qty',
        'status',
        'message',
    ];

    public function tool()
    {
        return $this->belongsTo(Tools::class, 'tool_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
