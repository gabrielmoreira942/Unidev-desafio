<div class="row">
    <div class="col-md d-flex justify-content-between align-items-center">
        <h1>Listagem de usuários</h1>
        <a href="{{route('user.create')}}" class="btn btn-success">Cadastrar novo</a>
    </div>
</div>
    @include('layout.messages')

<div class="table-responsive">
<table class="table table-striped mt-5">

    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col" width="150"></th>
        </tr>

    </thead>
<tbody>
  @foreach($users as $user)
<tr>
        <td scope="col">{{$user->id}}</td>
        <td scope="col">{{$user->name}}</td>
        <td scope="col">{{$user->email}}</td>
        <td scope="col">
            <a class="btn btn-primary btn-sm" href="{{route('user.edit', $user->id)}}">Editar</a>
            <a class="btn btn-danger btn-sm" onclick="deleteInDatabase('{{route('user.destroy', $user->id)}}')">Excluir</a>
        </td>
</tr>
@endforeach
</tbody>
</table>
</div>

<div class="mt-5">

    {{ $users->appends([
        'action' => request('action'),
        'keyword'=> request('keyword'),
        'email'=> request('email'),
        'order_by'=> request('order_by'),


        ])->links() }}
</div>
