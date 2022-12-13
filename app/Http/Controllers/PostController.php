<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //show all posts
    public function index(){
        return view('posts.index', [
            'listData' => Posts::all()
        ]);
    }

    //show by id
    public function show(Posts $post){
        return view('posts.show', [
            'listData' => $post
        ]);
    }
}
