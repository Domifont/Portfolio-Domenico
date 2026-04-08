<div style="height:400px; overflow-y: scroll;">
    <table class="table table-striped table-hover">
        <thead class="table-dark sticky-top">
            <Tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Sottotitolo</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Categoria</th>
                <th scope="col">Tags</th>
                <th scope="col">Inserito il</th>
                <th scope="col">Azioni</th>
            </Tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <th scope="row">{{$article->id}} </th>
                    <td>{{$article->title}} </td>
                    <td>{{$article->subtitle}} </td>
                    <td>{{$article->body}} </td>
                    <td>{{$article->category->name ?? 'Nessuna categoria'}} </td>
                    <td>
                        @foreach($article->tags as $tag)
                            {{$tag->name}}
                        @endforeach
                    </td>
                    <td>{{$article->created_at->format('d/m/Y')}}</td>
                    <td class="text-center justify-content-center">
                        <a href="{{ route('article.show', $article) }}" class="btn btnMy btn-success">Leggi</a>
                        <br><br>
                        <a href="{{route('article.edit', $article)}}" class="btn btnMy btn-warning">Modifica</a>
                        <br><br>
                        <form action="{{route('article.destroy', $article)}}" method="POST" class="d-inline"> 
                            @csrf
                            @method('DELETE')
                            <button type="submit" class=" btnMy btn btn-danger">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
