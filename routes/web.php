<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
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
// __________________________________________________________________________________________________________________

// ___________________POST API_____________________________________________

// get all posts via controller
Route::get('/', [PostController::class, 'index']);

//show create form   - must be above of get single post !!!
//middleware('auth') - for authenticated users, middleware('guest') for guests
Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth');

//store(save) - create form
Route::post('/posts', [PostController::class, 'store'])->middleware('auth');

//show edit form
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->middleware('auth');

//store(save) - edit form
Route::put('/posts/{post}', [PostController::class, 'update'])->middleware('auth');

//delete post
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->middleware('auth');

//manage posts
Route::get('/posts/manage', [PostController::class, 'manage'])->middleware('auth');

// get single post - with auto id checker - via controller - must be under of all route !!!
Route::get('/posts/{post}', [PostController::class, 'show']);


// ___________________Company API__________________________________________

// get all companies via controller
Route::get('/company', [CompanyController::class, 'index']);

//show create form   - must be above of get single post !!!
Route::get('/company/create', [CompanyController::class, 'create'])->middleware('auth');

Route::get('/company_info/{id}', [CompanyController::class, 'info']);


// __________________Users API___________________________________________

//user create form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//store user to DB
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

//show user login form, use name() to use it in middleware
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest'); 

//authenicate user for log-in
Route::post('/users/authenicate', [UserController::class, 'authenicate']);

//user logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');