<?php

namespace App\Http\Controllers;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Str;

class PostsController extends BaseController
{
    public function index(){
        $posts = Post::all();
        $categories = Category::all();
        //Возврааем страницу и переменную
        return view('Post/index', compact('posts','categories'));
    }

    public function create(){
        $posts = Post::all();
        $categories = Category::all();
        return view('Post/create', compact('posts','categories')  );
    }

    public function store(){
        
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            // 'category'=>'string'
        ]);
        
        $this->service->store($data);
        
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));

    }

    public function edit(Post $post){
        // $data = request()->validate([
        //     'id' => 'string'
        // ]);

        // $data = Post::find($post['id']);
        $data = clone($post);
        $data['category'] = $post->category->title;
        return json_encode($data);
    }

    public function update(UpdatePostRequest $request, Post $post){
     
        $data = request()->validate([
            'title' => 'string|nullable',
            'content' => 'string|nullable',
            'image' => 'string|nullable',
            'is_published'=>'string',
            'category'=>'string'
        ]);
        
        // var_dump($data);
        // dd(Str::lower($data['category']));
        $data['category_id'] = Category::where('title',Str::lower($data['category']))->first()->id;
        // dd(Category::where('title',Str::lower($data['category']))->first()->id);
        unset($data['category']);
        if(isset($data['is_published'])){
            $data['is_published']=1;
        }else{
            $data['is_published']=0;
        }

        $post->update($data);

        return json_encode($post);//Данные можно и не отсылать
    }

    public function delete(Post $post){
        
        return json_encode($post);
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('post.index');
    }
}
