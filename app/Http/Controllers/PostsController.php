<?php

namespace App\Http\Controllers;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\FilterRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use App\Http\Filters\PostFilter;

use Illuminate\Support\Str;

class PostsController extends BaseController
{
    public function index(FilterRequest $request){
        $data = $request->validated();
        $posts = Post::paginate(10);
        $categories = Category::all();
        $filter = app()->make(PostFilter::class,['queryParams'=>array_filter($data)]);
        
        $posts = Post::filter($filter)->paginate(10);
        
        
        
        
        
        // $query = Post::query();
        // if(isset($data['category_id'])){
        //     $query->where('category_id', $data['category_id']);
        // }
        // if(isset($data['title'])){
        //     //оператор like делает поиск по набору букв
        //     $query->where('title', 'like', "%{$data['title']}%");
        // }
        // if(isset($data['content'])){
        //     //оператор like делает поиск по набору букв
        //     $query->where('content', 'like', "%{$data['content']}%");
        // }
        
        // $posts = $query->get();
        // dd($posts);
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
