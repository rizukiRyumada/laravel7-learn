<?php

// use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; // kelas request dari laravel
use Illuminate\Support\Facades\Auth;

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

// membuat function langsung di dalam route
// Route::get('/', function () {
//     $name = request('name');

//     return view('home', ['name' => $name]);
// });

// memanggil controller untuk laravel 8
// Route::get('/', [HomeController::class, 'index']); // untuk laravel 8
// memanggil controller biasa untuk laravel 7
// Route::get('/', 'HomeController@index');
// memanggil controller dengan invokable method untuk laravel 7

Route::view('contact', 'contact');

// get full url path from request class
// Route::get('contact', function(Request $request){
//     // return $request->fullUrl(); // ambil full url
//     // return $request->path(); // ambil pathnya aja
//     // return request()->path(); // ambil path menggunakan php function

//     return $request->path() == "contact" ? true : false; // penulisan if else menggunakan one line coding
//     // return $request->is("contact") ? true : false; // penulisan if else menggunakan one line coding dengan class is
// });

Route::view('about', 'about');

Route::view('login', 'login');

/* -------------------------------------------------------------------------- */
/*                           laravel slug (wildcard)                          */
/* -------------------------------------------------------------------------- */

// Route::get('/post/{slug}', 'PostController@show');

/* -------------------------------------------------------------------------- */
/*                            laravel model binding                           */
/* -------------------------------------------------------------------------- */
// taruh nama singular dari tabel pada curly brackets
// Route::get('/post/{post}', 'PostController@show');
/**
 * saat menggunakan cara yg seperti di atas, maka nanti yang dibaca pada slug adalah id dari row table
 *
 * cara agar dia bisa liat dari slug lagi yaitu dengan menmbahkan function getRouteKeyName() pada model Post
 */

// untuk menampilkan category
Route::get('/categories/{category:slug}', 'CategoryController@show')->name('categories.show');
// untuk menampilkan tag
Route::get('/tags/{tag:slug}', 'TagController@show')->name('tag.show');

/* ---------------- model binding dengan dua indentifier url ---------------- */
// Route::get('/post/{category:slug}/{post:slug}', 'PostController@show');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/search/post', 'SearchController@post')->name('search.post');
/* -------------------------------------------------------------------------- */


/* -------------------------------------------------------------------------- */
/*                              Route Group Tanpa                             */
/* -------------------------------------------------------------------------- */
/**
 * menambahkan middleware pada setiap route untuk autentikasi
 */
// Route::get('/post', "PostController@index"); // untuk menampilkan halaman index Post

/* ------------------------- menggunakan named route ------------------------ */
// Route::get('/post', "PostController@index")->name('post.index'); // untuk menampilkan halaman index Post

// menampilkan form create dan menyimpan post
// Route::get('/post/create', 'PostController@create')->middleware('auth')->name('post.create'); // untuk menampilkan form
// Route::post('/post/store', 'PostController@store')->middleware('auth'); // untuk menyimpan post

/* -------- model binding dengan langsung mengidentifikasi nama slug -------- */
// menampilkan form update dan menyimpan post
// Route::get('/post/{post:slug}/edit', 'PostController@edit')->middleware('auth'); // untuk menampilkan form update per post
// Route::patch('/post/{post:slug}/edit', 'PostController@update')->middleware('auth'); // untuk mengupdate post
/**
 * ada 2 metode untuk mengupdate,
 * - patch -> untuk mengupdate sebagian data attribut pada tabel
 * - put -> untuk mengupdate keseluruhan data attribut pada tabel
 */

// menghapus post
// Route::delete('/post/{post:slug}/delete', 'PostController@destroy')->middleware('auth');

// Route::get('/post/{post:slug}', 'PostController@show'); // untuk menampilkan salah satu form

/* -------------------------------------------------------------------------- */
/*                                 ROUTE GROUP                                */
/* -------------------------------------------------------------------------- */
/**
 * menambahkan middleware ke Route::group()
 *
 * menggunakan prefix untuk menambahkan kata2 sebelum route
 * - apabila ingin menggunakan prefix, pastikan url route yang ada slugnya ditaruh dibawah route group agar
 *   php ga menganggap kalo url bagian ke dua itu slug di Route::group, sehingga route jadi berantakan
 */
Route::prefix('post')->middleware('auth')->group(function () {
    // Route::get('/post', "PostController@index"); // untuk menampilkan halaman index Post

    /* ------------------------- menggunakan named route ------------------------ */
    // Route::get('/post', "PostController@index")->name('post.index')->withoutMiddleware('auth'); // untuk menampilkan halaman index Post

    // menampilkan form create dan menyimpan post
    Route::get('/create', 'PostController@create')->name('post.create'); // untuk menampilkan form
    Route::post('/store', 'PostController@store'); // untuk menyimpan post

    /* -------- model binding dengan langsung mengidentifikasi nama slug -------- */
    // menampilkan form update dan menyimpan post
    Route::get('/{post:slug}/edit', 'PostController@edit'); // untuk menampilkan form update per post
    Route::patch('/{post:slug}/edit', 'PostController@update'); // untuk mengupdate post
    /**
     * ada 2 metode untuk mengupdate,
     * - patch -> untuk mengupdate sebagian data attribut pada tabel
     * - put -> untuk mengupdate keseluruhan data attribut pada tabel
     */

    // menghapus post
    Route::delete('/{post:slug}/delete', 'PostController@destroy');

    // Route::get('/post/{post:slug}', 'PostController@show')->withoutMiddleware('auth'); // untuk menampilkan salah satu form
});

Route::get('/post', "PostController@index")->name('post.index'); // untuk menampilkan halaman index Post
Route::get('/post/{post:slug}', 'PostController@show')->name('post.show'); // untuk menampilkan salah satu form
