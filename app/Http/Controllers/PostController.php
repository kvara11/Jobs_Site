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
            'listData' => Posts::filter(request(['tag', 'search']))->orderBy('id', 'DESC')->paginate(4)     // GET BY PAGE SIZE
            // 'listData' => Posts::filter(request(['tag', 'search']))->get();                              // GET ALL
            // 'listData' => Posts::filter(request(['tag', 'search']))->simplePaginate(3)                   // GET BY PAGE SIZE
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
    public function store(Request $request){                                     //Request $request - dependency injection
        $form = $request->validate([
            'title'=>['required', 'max:255'],
            'email'=>['email', 'required', 'max:255'],
            'company_name'=>['required', 'unique:posts', 'max:255'],                       //check if company name is unique in DB posts.company_name table row
            'country'=>['required', 'max:255'],
            'tags'=>'string',
            'description'=>['required', 'min:20']
        ]);

        // dd($request->file('logo'));

        if($request->hasFile('logo')){
            $form['logo'] = $request->file('logo')->store('logos', 'public');             //file upload - storage/app/logos
        }                                                                                 //use command to link correctly ->   php artisan storage:link

        Posts::create($form);

        // Session::flash('message', 'Post Created!');                                      //same as redirect('/')->with()
        return redirect('/')->with('message', 'Post Created!');
    }

    //show edit form
    public function edit(Posts $post){
        return view('posts.edit', ['post' => $post]);
    }

    //update edit form in DB
    public function update(Request $request, Posts $post){                                     //Request $request - dependency injection
        $form = $request->validate([
            'title'=>['required', 'max:255'],
            'email'=>['email', 'required', 'max:255'],
            'company_name'=>['required', 'max:255'],                       //check if company name is unique in DB posts.company_name table row
            'country'=>['required', 'max:255'],
            'tags'=>'string',
            'description'=>['required', 'min:20']
        ]);

        // dd($request->file('logo'));

        if($request->hasFile('logo')){
            $form['logo'] = $request->file('logo')->store('logos', 'public');             //file upload - storage/app/logos
        }                                                                                 //use command to link correctly ->   php artisan storage:link

        $post->update($form);                                                              //updates current $post

        // Session::flash('message', 'Post Created!');                                      //same as redirect('/')->with()
        return back()->with('message', 'Post Updated!');
    }

    public function destroy(Posts $post){
        $post->delete();
        return redirect('/')->with('message', 'Post Deleted!');
    }
}
