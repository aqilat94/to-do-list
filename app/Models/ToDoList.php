<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ToDoList extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'to_do_lists';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'reminder',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
