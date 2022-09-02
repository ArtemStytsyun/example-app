<?php 

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePostRequest;
use App\Services\Post\Service;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Str;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
       $this->service = $service;
    } 
}