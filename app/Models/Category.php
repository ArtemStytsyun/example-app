<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories'; 
    protected $guarded = false;

    public function posts(){
        return $this->hasMany(Post::class, 'post_id', 'id');
    }

    public function getTitleAttribute($value) {
        return Str::ucfirst($value);
    }
}
