<?php

use App\Http\Controllers\PostController;
use App\Models\Posts;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ___________________________________________________________

// http://127.0.0.1:8000/test/4
Route::get('/test/{id}', function($id){
    // dd($id);
    // ddd($id);
    return response('Post ' .$id);
})->where('id', '[0-9]+');                     //regular expression



// get all posts
// Route::get('/', function () {
//     return view('posts', [
//         'listData' => Posts::all()
//     ]);
// });


// get single post - with manual id checker
// Route::get('/posts/{id}', function ($id) {
//     $post = Posts::find($id);

//     if($post){
//         return view('post', [
//             'listData' => $post
//         ]);
//     }else{
//         abort('404');
//     }
// });


// get single post - with auto id checker
// Route::get('/posts/{post}', function (Posts $post) {

//     return view('post', [
//         'listData' => $post
//     ]);
// });

// ________________________________________________________________

// get all posts via controller
Route::get('/', [PostController::class, 'index']);

//show create form   - must be above of get single post !!!
Route::get('/posts/create', [PostController::class, 'create']);

//store - create form
Route::post('/posts', [PostController::class, 'store']);

// get single post - with auto id checker - via controller - must be under of all route !!!
Route::get('/posts/{post}', [PostController::class, 'show']);