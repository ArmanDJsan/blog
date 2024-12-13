@extends('adminlte::page')

@section('title', 'Editar roles de usuario')

@section('content_header')
    <h1>Editar roles de usuarios</h1>
@stop

@section('content')


@if (session('info'))
    <div class="alert alert-success">
        <strong> {{session('info')}}</strong>
    </div>
@endif
    
<div class="card mt-1">
    <div class="card-body">

        
        <p class="h5">Nombre</p>
        <p class="form-control">{{$user->name}}</p>
        @php  $checked=null; @endphp 
        @foreach ($roles as $role)
        @php  $checked=null; @endphp 
            @foreach ($user->roles as $Urole)
                @if ($role->id == $Urole->id)
                @php $checked=true @endphp
                @endif
            @endforeach


            {{ html()->modelForm($user, 'PUT', route('admin.users.update',[$user]))->open() }}
            {{ html()->checkbox($name = 'roles[]', $checked , $value = $role->id)->class('form-conrol')}}
            {{$role->name}}

        @endforeach
        {{ html()->button('Asignar rol', 'submit')->class('btn btn-primary')}}
        {{ html()->closeModelForm() }}

    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop

