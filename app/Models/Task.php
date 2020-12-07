<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Task extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'tasks';
    
    protected $fillable = [
        'user_id',
        'title',
        'color',
        'description',
        'due_date'
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User');
    }
}
