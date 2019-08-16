<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.welcome');
    }

    public function search()
    {
        $posts = Post::where('title', 'like', '%' . $_GET['search_query'] . '%')->orWhere('body', 'like', '%' . $_GET['search_query'] . '%')->get();
        return view('pages.search', compact('posts'));
    }
}
