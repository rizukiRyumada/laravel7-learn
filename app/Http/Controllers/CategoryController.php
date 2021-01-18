<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
    * show the category view to user
    *
    * @return view('category')
    */
    public function show(Category $category)
    {
        // menampilkan post dengan category
        $posts = $category->posts()->latest()->paginate(6);
        return view('post.index', compact('posts', 'category'));
    }
}
