<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
    * menampilkan post berdasarkan tag
    *
    * @return view(post_tag)
    */
    public function show(Tag $tag)
    {
        $posts = $tag->posts()->latest()->paginate(6);
        return view('post.index', compact('posts', 'tag'));
    }
}
