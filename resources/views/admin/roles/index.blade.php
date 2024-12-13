@extends('adminlte::page')

@section('title', 'Lista de roles')

@section('content_header')
    <a href="{{route('admin.roles.create')}}" class="btn btn-primary btn-sm float-right">Crear rol</a>
    <h1>Lista de roles</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Role</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td witdh="10px">
                                <a href="{{route('admin.roles.edit',$role)}}" class="btn btn-primary btn-sm">Editar</a>
                            </td>
                            <td witdh="10px">
                                <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <p>Bienvenido al panel de administracion.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop