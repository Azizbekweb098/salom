<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Todo;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'todo_id'];

    public function todos()
    {
        return $this->hasMany(Todo::class, 'category_id');
    }

}
