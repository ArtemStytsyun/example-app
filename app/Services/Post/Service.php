<?php 

namespace App\Services\Post;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Str;

class Service
{
    public function store($data)
    {
        $id = Category::where('title',request()->all()['category'])->first()->id;
        $data['category_id'] = $id;

        Post::create($data);
    }

    public function update()
    {
        
    }
}

