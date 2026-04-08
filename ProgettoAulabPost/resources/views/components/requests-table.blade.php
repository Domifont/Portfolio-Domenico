<table class="table table-striped table-hover">
        <thead class="table-dark sticky-top">
            <Tr>
                <th scope="col" class="text-center justify-content-center">#</th>
                <th scope="col" class="text-center justify-content-center">Nome</th>
                <th scope="col" class="text-center justify-content-center">Email</th>
                <th scope="col" class="text-center justify-content-center">Accettare</th>
                <th scope="col" class="text-center justify-content-center">Rifiutare</th>
            </Tr>
        </thead>
        <tbody>
            @foreach ($roleRequests as $user)
                <tr>
                    <th class="text-center justify-content-center" scope="row">{{$user->id}} </th>
                    <td class="text-center justify-content-center">{{$user->name}} </td>
                    <td class="text-center justify-content-center">{{$user->email}} </td>
                    <td class="text-center justify-content-center">
                        @switch($role)
                            @case('Amministratore')
                                <form action="{{route('admin.setAdmin' , $user)}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btnRole btn-success">Accetta {{$role}}</button>
                                </form>
                                @break
                                @case('Revisore')
                                <form action="{{route('admin.setRevisor' , $user)}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btnRole btn-success">Accetta {{$role}}</button>
                                </form>
                                @break
                                @case('Redattore')
                                        <form action="{{route('admin.setWriter' , $user)}}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btnRole btn-success">Accetta {{$role}}</button>
                                        </form>
                                @break
                        @endswitch
                    </td>
                    <td class="text-center justify-content-center">
                        @switch($role)
                            @case('Amministratore')
                                <form action="{{route('admin.rejectAdmin' , $user)}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btnRole btn-danger">Rifiuta {{$role}}</button>
                                </form>
                                @break
                                @case('Revisore')
                                <form action="{{route('admin.rejectRevisor' , $user)}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btnRole btn-danger">Rifiuta {{$role}}</button>
                                </form>
                                @break
                                @case('Redattore')
                                        <form action="{{route('admin.rejectWriter' , $user)}}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btnRole btn-danger">Rifiuta {{$role}}</button>
                                        </form>
                                @break
                        @endswitch
                    </td>
                </tr>
            @endforeach
        </tbody>
</table>