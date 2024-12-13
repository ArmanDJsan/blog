<div>
    <div class="card">
        <div class="card-header">
            <input class="form-control" type="text" placeholder="Buscar usuario" wire:model="search">
        <div class="card-body">
            <table class=" table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td> 
                        <td width="10px"><a class="btn btn-sm btn-primary" href="{{route('admin.users.edit',$user)}}">editar</a>
                        <td width="10px">
                            <form action="{{route('admin.users.destroy',$user)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit">eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              
            </table>
        </div>
        <div class="card-footer">
            {{$users->render()}}
        </div>
    </div>
</div>
