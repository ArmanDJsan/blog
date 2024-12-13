@extends('adminlte::page')

@section('title', 'Editar etiqueta')

@section('content_header')
    <h1>Editar etiquetas {{$tag->color}}</h1>
@stop

@section('content')
    @if (session('info'))
    <div class="alert alert-success">
        <strong> {{session('info')}}</strong>
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            {{ html()->modelForm($tag, 'PUT', route('admin.tags.update',[$tag]))->open() }}
            
            <div class="form-group">
                {{ html()->label('Nombre', 'name')}}
                {{ html()->text('name')->placeholder('Ingrese el nombre de la etiqueta')->class('form-control') }}
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror

            </div>
        
            <div class="form-group">
                {{ html()->label('Slug', 'slug')}}
                {{ html()->text('slug')->placeholder('Slug de la etiqueta')->class('form-control') }}
                @error('slug')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        
        <div class="form-group">
                {{ html()->label('Color', 'color')}}
                {{ html()->select($name = 'color', $options = $colores, $value = $tag->color)->placeholder('Selecciona un color')->class('form-control')  }}
                @error('color')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            {{ html()->button('Actualizar etiqueta', 'submit')->class('btn btn-primary')}}
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