<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create','store');
        $this->middleware('can:admin.posts.edit')->only('edit','update');
        $this->middleware('can:admin.posts.destroy')->only('destroy'); 
    }

    public function index()
    {
        return view('admin.posts.index');
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();

        return view('admin.posts.create',compact('tags','categories'));
    }

    public function store(StorePostRequest $request)
    {

  
      $post= Post::create($request->all());
        $post->tags()->attach($request->tags);
        if (   $request->file('file'))
         {
            
            $url = Storage::put('posts', $request->file('file'));
            $post->image()->create([ 'url' => $url]);
        }

        return redirect()->route('admin.posts.edit', compact('post'))->with('info', 'Su post se ha creado con exito');
    }

    public function edit(Post $post)
    {
        $this->authorize('author', $post);
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post','categories','tags'));
    }

    public function update(request $request, Post $post)
    {
        $this->authorize('author', $post);
          $request->validate([
            'name' => 'required',
            'slug' => "required|unique:posts,slug,$post->id",
            'category_id' => 'required',
            'tags' => 'required'
           
        ]);
 

        if (   $request->file('file'))
        {
           Storage::delete($post->image->url);
           $url = Storage::put('posts', $request->file('file'));
           $post->image->url = $url;
           $post->image->save();
       }
        $post->update($request->all());
        $post->tags()->sync($request->tags);
     
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();
        return view('admin.posts.edit',compact('post','categories','tags'))->with('info', 'Su post se ha editado con exito');  
       
    }

    public function destroy(Post $post)
    {
        $this->authorize('author', $post);
        
        $post->delete();

        return view('admin.posts.index')->with('info', 'el post se ha eliminado con exito');
    }
}
