<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class PostController extends Controller
{
    public function index(){
        $posts =Post::where('status', 2)->latest('id')->paginate(7);
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post){
        
        $this->authorize('published', $post);
        $similares = Post::where('category_id', $post->category->id)->where('status', 2)->where('id', '!=', $post->id )->paginate(4);
        return view('posts.show', compact('post','similares'));
    }

    public function category(Category $category){
       
        $posts = Post::where('category_id', $category->id)->where('status',2)->paginate(7);
        return view('posts.category', compact('posts', 'category'));
        
    }
    public function tag(Tag $tag){
        $posts = $tag->posts()->where('status', 2)->paginate(7);
        return view('posts.tag', compact('posts','tag'));
    }
}
