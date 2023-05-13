<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orders extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'orders';
    protected $primary = 'id';
    protected $with = ['user', 'user_tools'];
    protected $fillable = [
        'user_id',
        'user_name',
        'status',
        'note',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function user_tools()
    {
        return $this->hasMany(UserTool::class, 'order_id', 'id');
    }
}
