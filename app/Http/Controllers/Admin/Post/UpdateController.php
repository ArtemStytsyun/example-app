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

class UpdateController extends BaseController
{
    public function __invoke(UpdatePostRequest $request, Post $post){
     
        $data = request()->validate([
            'title' => 'string|nullable',
            'content' => 'string|nullable',
            'image' => 'string|nullable',
            'is_published'=>'string',
            'category'=>'string'
        ]);
        
        $data['category_id'] = Category::where('title',Str::lower($data['category']))->first()->id;
        unset($data['category']);

        if(isset($data['is_published'])){
            $data['is_published']=1;
        }else{
            $data['is_published']=0;
        }

        $post->update($data);

        return json_encode($post);
    }
}
