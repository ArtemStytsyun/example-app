<?php

namespace App\Http\Controllers\Admin\Category;

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
        return view('Category/create', compact('posts','categories')  );
    }
}
