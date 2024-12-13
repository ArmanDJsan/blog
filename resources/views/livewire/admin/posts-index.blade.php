<div>
        
        <div class="card" >
            <div class="card-header">
                @can('admin.posts.create')
                <a href="{{route('admin.posts.create')}}" class="btn btn-primary mb-2 float-right">Crear post</a>
                @endcan
                <input class="form-control" type="text" placeholder="Buscar post" wire:model="search">
            </div>
            @if ($posts->count())
            <div class="card-body">
                <table class="table table-striped">
                    <THead>
                        <tr>
                            <th>id</th>
                            <th>titulo</th>
                           
                        </tr>
                    </THead>

                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->name}}</td>

                            @can('admin.posts.edit')
                            <td width="10px"> <a href="{{route('admin.posts.edit',$post)}}", class="btn btn-primary btn-sm">editar</a> </td>
                            @endcan
                            @can('admin.posts.destroy')
                            <td width="10px"> 
                                <form action="{{route('admin.posts.destroy',$post)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="submit">eliminar</button>
                                </form>
                            </td>
                            @endcan
                        </tr> 
                        @endforeach
                    </tbody>
                </table>   
            </div>
            <div class="card-footer">
                 {{$posts->render()}}
            </div>
            @else
            <div class="card-body ">

                <strong>No hay ningun registro</strong>
            </div>
            @endif
               
        </div>
    
</div>

