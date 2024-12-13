@extends('adminlte::page')

@section('title', 'Editar Categoria')

@section('content_header')
    <h1>Editar Categoria</h1>
@stop

@section('content')
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
        
    @endif
  
    <div class="card">
        <div class="card-body">
            
            {{ html()->modelForm($category, 'PUT', route('admin.categories.update',[$category]))->open() }}
            
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
           {{ html()->button('Modificar categoria', 'submit')->class('btn btn-primary')}}
           {{ html()->button('Volver al inicio', 'button')->class('btn btn-primary')}}
            {{ html()->closeModelForm() }}
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