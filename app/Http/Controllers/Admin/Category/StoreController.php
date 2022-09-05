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

class StoreController extends BaseController
{
    public function __invoke(){
        $data = request()->validate([
            'title' => 'string',
        ]);
        Category::create($data);
        return redirect()->route('admin.category.index');
    }
}
