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
        // dd(auth()->id());
        return view('posts.index', [
            'listData' => Posts::filter(request(['tag', 'search']))->orderBy('id', 'DESC')->paginate(4)     // GET BY PAGE SIZE, filter connected to filterScope, ['tag', 'search'] -> name of inputs
            // 'listData' => Posts::filter(request(['tag', 'search']))->get()->dd()                         // GET ALL
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

        $form['user_id'] = auth()->id();                                                  //add logged user id

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
        //check if user is correct
        if($post->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }
        
        $form = $request->validate([
            'title'=>['required', 'max:255'],
            'email'=>['email', 'required', 'max:255'],
            'company_name'=>['required', 'max:255'],                                   
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

    //delete from DB
    public function destroy(Posts $post){
        if($post->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }
        
        $post->delete();
        return redirect('/')->with('message', 'Post Deleted!');
    }

    //manage user's posts
    public function manage(){
        return view('posts.manage', [
            'posts' => auth()->user()->postsByUser()->get()
        ]);
    }
}
