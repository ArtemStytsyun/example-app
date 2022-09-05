<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\FilterRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;


use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;

use App\Http\Filters\PostFilter;

use Illuminate\Support\Str;

class CreateController extends BaseController
{
    public function __invoke(){
        $posts = Post::all();
        $categories = Category::all();
        return view('Post/create', compact('posts','categories')  );
    }
}
