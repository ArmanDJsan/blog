@extends('adminlte::page')

@section('title', 'Crear rol')

@section('content_header')
    <h1>Crear roles</h1>
@stop

@section('content')
    <div class="card">
        <div  class="card-body">
            {{ html()->form( 'POST', route('admin.roles.store'))->open() }}
        
                <div class="form-group">
                    {{ html()->label('Nombre', 'name')}}
                    {{ html()->text('name')->placeholder('Ingrese el nombre del rol')->class('form-control') }}
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <h2 class="h3">Lista de permisos</h2>
                @foreach ($permissions  as $permission)
                <div>
                         <label>
                                {{ html()->checkbox($name = 'permissions[]', $checked =null, $value = $permission->id)->class('mr-1')}}
                                {{$permission->description}}
                        </label>
                </div>
                    
                @endforeach

            {{ html()->button('crear rol', 'submit')->class('btn btn-primary btn-sm')}}
            {{ html()->form()->close() }}
        </div-card>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop