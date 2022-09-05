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

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request){
        $data = $request->validated();
        $posts = Post::paginate(10);
        $categories = Category::all();
        $filter = app()->make(PostFilter::class,['queryParams'=>array_filter($data)]);
        
        $posts = Post::filter($filter)->paginate(10);
        
        //Возврааем страницу и переменную
        return view('Post/index', compact('posts','categories'));
    }
}