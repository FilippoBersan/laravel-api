<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {


        request()->validate([
            'key' => ['nullable','string', 'min:1']
        ]);
        // $posts = Post::all();

        $posts = Post::paginate(9);
        return response()->json([
            'status'=> true,
            'results' => $posts

        ]);
    }
}
