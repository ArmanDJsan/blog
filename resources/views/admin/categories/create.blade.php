@extends('adminlte::page')

@section('title', 'Crear categoria')

@section('content_header')
    <h1>Crear nueva categoria</h1>
@stop

@section('content')
   
<div class="card">
    <div class="card-body">
        {{ html()->form( 'POST', route('admin.categories.store'))->open() }}
        
        <div class="form-group">
            {{ html()->label('Nombre', 'name')}}
            {{ html()->text('name')->placeholder('Ingrese el nombre de la categoria')->class('form-control') }}
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
       
        <div class="form-group">
            {{ html()->label('Slug', 'slug')}}
            {{ html()->text('slug')->placeholder('Slug de la categoria')->class('form-control') }}
            @error('slug')
                 <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
       {{ html()->button('crear categoria', 'submit')->class('btn btn-primary')}}
       {{ html()->form()->close() }}
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> $("#name").keyup(function() {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^\w ]+/g, "").replace(/ +/g, "-");
        $("#slug").val(Text);  
      }); </script>
  
@stop