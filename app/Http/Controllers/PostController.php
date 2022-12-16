<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //show all posts
    public function index(){
        // dd(request()->search);
        return view('posts.index', [
            // 'listData' => Posts::filter(request(['tag', 'search']))->get();        // GET ALL
            'listData' => Posts::filter(request(['tag', 'search']))->paginate(3)     // GET BY PAGE SIZE
            // 'listData' => Posts::filter(request(['tag', 'search']))->simplePaginate(3)     // GET BY PAGE SIZE
        ]);
    }

    //show by id
    public function show(Posts $post){
        return view('posts.show', [
            'listData' => $post
        ]);
    }

    //show create form
    public function create(){
        return view('posts.create');
    }

    //insert in DB
    public function store(Request $request){                                //Request $request - dependency injection
        $form = $request->validate([
            'title'=>'required',
            'email'=>['email', 'required', 'max:255'],
            'company_name'=>['required', 'unique:posts'],         //check if company name is unique in DB posts.company_name table row
            'country'=>'required',
            'tags'=>'string',
            'description'=>['required', 'min:20']
        ]);
        // dd($form);
        Posts::create($form);

        // Session::flash('message', 'Post Created!');          //same as redirect('/')->with()

        return redirect('/')->with('message', 'Post Created!');
    }
}
