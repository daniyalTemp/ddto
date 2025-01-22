<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\blogCategory;
use App\Models\blogs;
use App\Models\products;
use Illuminate\Http\Request;

class blogController extends Controller
{
    public function index()
    {
        $blogs= blogs::all();
        $cats= blogCategory::all();
        $lastPosts= blogs::orderBy('created_at','desc')->take(3)->get();
        $hotProducts = products::where('available', true)->where('hot', true)->take(3)->get();

        return view('front.blog.index' , compact('blogs','cats' ,'lastPosts','hotProducts'));
    }

    public function categoryPostList(int $id)
    {
        $selectedCategory=blogCategory::find($id);
        $cats= blogCategory::all();
        $lastPosts= blogs::orderBy('created_at','desc')->take(3)->get();
        $hotProducts = products::where('available', true)->where('hot', true)->take(3)->get();
        $blogs= $selectedCategory->Blog()->get();
        return view('front.blog.index' , compact('blogs' , 'selectedCategory' , 'cats','lastPosts','hotProducts','selectedCategory'));

    }

    public function showPost(int $id)
    {
        $post = blogs::find($id);
        $post->update(['seen' => $post->seen + 1]);
        $cats= blogCategory::all();
        $lastPosts= blogs::orderBy('created_at','desc')->take(3)->get();
        $hotProducts = products::where('available', true)->where('hot', true)->take(3)->get();
        return view('front.blog.item' , compact('post' , 'cats' ,'lastPosts','hotProducts'));

    }
}
