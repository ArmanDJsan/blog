@extends('adminlte::page')

@section('title', 'editar roles')

@section('content_header')
    <h1>editar rol</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        <strong> {{session('info')}}</strong>
    </div>
@endif
   <div class="card">
        <div class="card-body">
          {{ html()->modelForm($role, 'PUT', route('admin.roles.update',[$role]))->open() }}
          <div class="form-group">
              {{ html()->label('Nombre', 'name')}}
              {{ html()->text('name')->placeholder('Ingrese el nombre del rol')->class('form-control') }}
              @error('name')
                  <span class="text-danger">{{$message}}</span>
              @enderror
          </div> 
          
          <h2 class="h3">Lista de permisos</h2>
          @php  $checked=null; @endphp 
          @foreach ($permissions  as $permission)
            @php $checked=null;  @endphp 
            @foreach ($role->permissions as $Hpermission)
              @if ($permission->id == $Hpermission->id)
                @php $checked=true; @endphp 
              @endif
            @endforeach
              <div>
                      <label>
                              {{ html()->checkbox('permissions[]',  $checked  ,$permission->id)->class('mr-1')}}
                              {{$permission->description}}
                      </label>    
              </div>
            @endforeach 

           {{ html()->button('Establecer permisos', 'submit')->class('btn btn-primary')}}
           {{ html()->closeModelForm() }}        
        </div>
   </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
   
@stop

