<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
Route::get('/greeting', [WelcomeController::class, 'greeting']);
// Route::get('/greeting', function () {
//     return view('blog.hello', ['name' => 'Rizky']);
//     });
    
// Route::get('/greeting', function () {
//     return view('hello', ['name' => 'Rizky']);
// }); 
// Route::resource('photos', PhotoController::class);
// Route::resource('photos', PhotoController::class)->only([ 'index', 'show'
// ]);

// Route::resource('photos', PhotoController::class)->except([ 'create', 'store', 'update', 'destroy'
// ]);

// Route::get('/', [PageController::class,'index']);
// Route::get('/about', [PageController::class,'about']);
// Route::get('/articles/{id}', [PageController::class,'articles']);
// Route::get('/', HomeController::class);
// Route::get('/about', AboutController::class);
// Route::get('/articles/{id}', ArticleController::class);



//Route::get('/hello', [WelcomeController::class,'hello']);

//  Route::get('/user/{name?}', function ($name=null) { 
//      return 'Nama saya '.$name;
// });
// Route::get('/user/{name?}', function ($name="john") { 
//     return 'Nama saya '.$name;
// });


// Route::get('/articles/{id} ', function ($id) {
//     return 'Halaman Artikel dengan ID'. $id;
//     });

// Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
//     return 'Pos ke-'.$postId." Komentar ke-: ".$commentId;
//     });
    
// Route::get('/about', function () { 
//     return 'Rizky Roza 2341760150';
// });

// Route::get('/', function () { 
//     return 'selamat datang';
// });

// Route::get('/world', function () {
// return 'World';
// });

// Route::get('/hello', function () { 
//     return 'Hello World';
// });


use App\Http\Controllers\ItemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


#cara untuk mendefinisikan rute 'item' untuk controller itemController
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/user/{name}', function ($name) { 
//     return 'Nama saya '.$name;
// });


//Route::resource('items', ItemController::class);
