

 @extends('adminlte::page')

@section('title', 'Lista de etiquetas')

@section('content_header')
        @can('admin.tags.create')
                    <a href="{{route('admin.tags.create')}}" class="btn btn-primary btn-sm float-right">Crear etiqueta</a>
        @endcan
        <h1>Lista de etiquetas</h1>
@stop

@section('content')
        @if (session('info'))
        <div class="alert alert-success">
            <strong> {{session('info')}}</strong>
        </div>
        @endif


    <div class="card">
         <div class="card-body">
            <div class="card-header">
                
            </div>


         <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>nombre</th>
                    <th>color</th>
                </tr>
            </thead>
            <tbody>
                
                    @foreach ($tags as $tag)
                    <tr>
                        <td>{{$tag->id}}</td>
                        <td>{{$tag->name}}</td>
                        <td>{{$tag->color}}</td>
                        @can('admin.tags.edit')
                        <td width=10px;> <a href="{{route('admin.tags.edit',$tag)}}"class="btn btn-primary btn-sm">Edit</a> </td>
                        @endcan
                        @can('admin.tags.destroy')
                            <td width="10px">  
                                <form action="{{route('admin.tags.destroy', $tag)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                
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
    <script> console.log('Hi!'); </script>
@stop 