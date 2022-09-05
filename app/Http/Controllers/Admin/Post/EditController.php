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

class EditController extends BaseController
{
    public function __invoke(Post $post){
        // $data = request()->validate([
        //     'id' => 'string'
        // ]);

        // $data = Post::find($post['id']);
        $data = clone($post);
        $data['category'] = $post->category->title;
        return json_encode($data);
    }
}