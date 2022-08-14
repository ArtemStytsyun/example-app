<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();

        return view('Category/index', compact('posts','categories'));
    }

    public function create(){
        $posts = Post::all();
        $categories = Category::all();
        return view('Category/create', compact('posts','categories')  );
    }

    public function store(){
        $data = request()->validate([
            'title' => 'string',
        ]);
        Category::create($data);
        return redirect()->route('category.index');
    }

    public function edit(Category $category){
        // $data = request()->validate([
        //     'id' => 'string'
        // ]);

        // $data = Post::find($post['id']);
        return json_encode($category);
    }

    public function update(Category $category){
        $data = request()->validate([
            'title' => 'string|nullable',
        ]);

        $post->update($data);

        return json_encode($category);//Данные можно и не отсылать
    }

}
