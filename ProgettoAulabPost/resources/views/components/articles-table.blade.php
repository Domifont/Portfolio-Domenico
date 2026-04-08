<div style="height:300px; overflow-y: scroll;">
    <table class="table table-striped table-hover">
        <thead class="table-dark sticky-top">
            <Tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Sottotitolo</th>
                <th scope="col">Redattore</th>
                <th scope="col">Azioni</th>
            </Tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <th scope="row">{{$article->id}} </th>
                    <td>{{$article->title}} </td>
                    <td>{{$article->subtitle}} </td>
                    <td>{{$article->user->name}} </td>
                    <td>
                        @if (is_null($article->is_accepted))
                            <a href="{{route('article.show', $article)}}" class="btn btnRole btn-success">Leggi l'articolo</a>
                        @else
                        <form action="{{route('revisor.undoArticle', $article)}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btnRole btn-success">Riporta in revisione</button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>