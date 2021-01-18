<?php // invokable controller dengan hanya satu method yg akan dipanggil, method lainnya akan diabaikan

// cara memanggilnya di route web.php
// Route::get('/', 'HomeController');

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // memanggil view dengan membawa variable + fungsi compact
        // $name = "Ryumada";
        // $name = $request->name; // mengambil data dari request name variable
        $name = request('name'); // mengambil data dari request function name
        return view('home', compact('name'));
    }
}

/* -------------------------------------------------------------------------- */

// controller biasa dengan method lainya yg bisa dipanggil langsung dri routes

// cara memanggilnya di route web.php
// Route::get('/', 'HomeController@index');

// namespace App\Http\Controllers;


// class HomeController extends Controller
// {
//     public function index(){
//         // return request('name');

//         // memanggil view dengan membawa array
//         // return view('home', ['name' => request('name')]);

//         // memanggil view dengan membawa variable + fungsi compact
//         $name = "Ryumada";
//         return view('home', compact('name'));
//     }
// }
