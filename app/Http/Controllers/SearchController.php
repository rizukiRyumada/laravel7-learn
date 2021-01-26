<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function post()
    {
        // ambil query search
        $query = request('query');
        //cari pada database
        $posts = Post::where('title', 'like', '%'.$query.'%')->latest()->paginate(10);

        return view('post.index', compact('posts'));
    }
}
