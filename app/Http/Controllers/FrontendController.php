<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Setting;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $total_post=Post::all();
        return view('index')
            ->with([
                'title'=>Setting::first()->site_name,
                'categories'=>Category::all(),
                'first_post'=>Post::orderBy('created_at','desc')->first(),
                'posts'=>Post::orderBy('created_at','desc')->skip(1)->take(count($total_post)-1)->get(),
                'setting'=>Setting::first()
            ]);
    }
}
