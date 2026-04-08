<x-layout>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="t-blue display-1 mt-5 mb-5">tag: {{$tag->name}}</h1>
                <x-searchbar/>
            </div>
        </div>
    </div>


    <div class="container my-5">
        <div class="row justify-content-evenly text-center">
            @foreach ($articles as $article)
                <div class="col-6 col-lg-3 box1 mt-3"
                    style="background: linear-gradient(rgba(20, 20, 20, 0.7), rgba(20, 20, 20, 0.4), rgba(20, 20, 20, 0.7)),
                    url({{ Storage::url($article->img) }}) ;background-size: contain; background-size: cover; background-repeat: no-repeat; background-position: center ">
                    <div class="mt-scritte">
                        <h4 class="card-title">{{ $article->title }}</h4>
                        <p class="card-subtitle">{{ $article->subtitle }}</p>
                        <a href="{{ route('article.show', $article) }}" class="text-link">Leggi</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>