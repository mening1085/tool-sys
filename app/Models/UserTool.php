<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserTool extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_tool';
    protected $primary = 'id';
    protected $with = ['tool', 'user'];
    protected $fillable = [
        'order_id',
        'user_id',
        'user_name',
        'tool_id',
        'qty',
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
