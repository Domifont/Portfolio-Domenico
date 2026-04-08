<div class="col-6 col-lg-3 box1 mt-3"
    style="background: linear-gradient(rgba(20, 20, 20, 0.7), rgba(20, 20, 20, 0.4), rgba(20, 20, 20, 0.7)),
    url({{ Storage::url($article->img) }}) ;background-size: contain; background-size: cover; background-repeat: no-repeat; background-position: center ">
    <div class="mt-scritte">
        <h4 class="card-title">{{ $article->title }}</h4>
        <p class="card-subtitle">{{ $article->subtitle }}</p>
        <p class="card-subtitle fst-italic small">Tempo di lettura {{$article->readDuration()}} min </p>
        <a href="{{ route('article.show', $article) }}" class="text-link">Leggi</a>
    </div>
</div>
