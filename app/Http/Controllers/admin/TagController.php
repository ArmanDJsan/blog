<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.tags.index')->only('index');
        $this->middleware('can:admin.tags.create')->only('create','store');
        $this->middleware('can:admin.tags.edit')->only('edit','update');
        $this->middleware('can:admin.tags.destroy')->only('destroy');
   
    }

    public function index()
    {

        $tags= Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        $colores = ['red' => 'rojo', 'green' => 'verde','blue' => 'azul', 'pink' =>'rosa', 'orange'=>'naranja','purple'=>'morado','gray'=>'gris','yellow'=>'amarillo','teal' =>'verde agua', 'black' => 'negro' ];
        return view('admin.tags.create',compact('colores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:tags,slug, $request->id",
            'color' => "required|unique:tags,color, $request->id"
        ]);
        $tag = new Tag;
        $tag->name = $request->input('name');
        $tag->slug = $request->input('slug');
        $tag->color = $request->input('color');
        $tag->save();
        return redirect()->route('admin.tags.edit',$tag)->with('info', 'La etiqueta se creo con exito');
        
    }

    public function edit(Tag $tag)
    {
        $colores = ['red' => 'rojo', 'green' => 'verde','blue' => 'azul', 'pink' =>'rosa', 'orange'=>'naranja','purple'=>'morado','gray'=>'gris','yellow'=>'amarillo','teal' =>'verde agua', 'black' => 'negro' ];
        return view('admin.tags.edit', compact('tag','colores'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:tags,slug,$tag->id",
            'color' => "required|unique:tags,color,$tag->id"
        ]);
        $tag->update($request->all());

        return redirect()->route('admin.tags.index',$tag)->with('info', 'La etiqueta se actualizo con exito');

    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('info', 'La etiqueta se elimino con exito');
    }
}
