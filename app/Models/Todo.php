<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'text'];

    public function category()
    {
        return $this->hasMany(Category::class);
    }
}
