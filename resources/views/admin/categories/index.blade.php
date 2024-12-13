@extends('adminlte::page')

@section('title', 'Lista categorias')

@section('content_header')
    
    @can('admin.categories.create')
         <a href="{{route('admin.categories.create')}}" class="btn btn-primary btn-sm float-right ">Agregar categoria</a>
    @endcan
    <h1>Lista de categorias</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong> {{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">

{{--             <div class="card-header">
               
            </div> --}}

            <table class="table table-striped">
                <THead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </THead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        @can('admin.categories.edit')
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.categories.edit',$category)}}">editar</a>
                            </td>
                        @endcan
                        @can('admin.categories.destroy')
                            <td width="10px">
                                <form action="{{route('admin.categories.destroy',$category)}}"  method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                         @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
  
@stop