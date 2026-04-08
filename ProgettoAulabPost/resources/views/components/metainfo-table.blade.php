<div style="height:400px; overflow-y: scroll;">
    <table class="table table-striped table-hover">
        <thead class="table-dark sticky-top">
            <Tr>
                <th scope="col" class="text-center justify-content-center">#</th>
                <th scope="col" class="text-center justify-content-center">NomeTag</th>
                <th scope="col" class="text-center justify-content-center">Q.tà articoli collegati</th>
                <th scope="col" class="text-center justify-content-center">Aggiorna</th>
                <th scope="col" class="text-center justify-content-center">Cancella</th>
            </Tr>
        </thead>
        <tbody>
            @foreach ($metaInfos as $metaInfo)
                <tr>
                    <th scope="row" class="text-center justify-content-center">{{ $metaInfo->id }} </th>
                    <td class="text-center justify-content-center">{{ $metaInfo->name }} </td>
                    <td class="text-center justify-content-center">{{ count($metaInfo->articles) }} </td>
                    @if ($metaType == 'tags')
                        <td class="text-center justify-content-center">
                            <form action="{{ route('admin.editTag', ['tag' => $metaInfo]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="text" value="{{ $metaInfo->name }}" name="name"
                                    placeholder="nuovo nome tag" class="form-control w-50 d-inline">
                                <button type="submit" class="btn btn-success">Aggiorna</button>
                            </form>
                        </td>
                        <td class="text-center justify-content-center">
                            <form action="{{ route('admin.deleteTag', ['tag' => $metaInfo]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Elimina</button>
                            </form>
                        </td>
                    @else
                        <td class="text-center justify-content-center">
                            <form action="{{ route('admin.editCategory', ['category' => $metaInfo]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="text" value="{{ $metaInfo->name }}" name="name"
                                    placeholder="nuovo nome categoria" class="form-control w-50 d-inline">
                                <button type="submit" class="btn btn-success">Aggiorna</button>
                            </form>
                        </td>
                        <td class="text-center justify-content-center">
                            <form action="{{ route('admin.deleteCategory', ['category' => $metaInfo]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Elimina</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    </table>
</div>
