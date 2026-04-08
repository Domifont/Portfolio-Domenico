<x-layout>
    @if (session('message'))
        <div class="alert alert-primary mt-5">
            {{ session('message') }}
        </div>
    @endif
    @if (session('alert'))
        <div class="alert alter-primary mt-5">
            {{ session('alert') }}
        </div>
    @endif
    <div class="container-fluid bg-gratt">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="text-white display-1 my-5">
                    The Aulab Post
                </h1>
                <div class="row justify-content-center">
                    <div class="col-5 mt-5">
                        <form action="{{route('article.search')}}" method="GET" class="d-flex" role="search">
                            <input type="search" name="query" class="form-control" placeholder="Cerca tra gli articoli" aria-label="Search">
                            <button class="btn btn-perso2" type="submit">Cerca</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-3 mb-5">
        <div class="row justify-content-center">
            <div class="col-8 text-center">
                <h3 class="t-blue display-1 mt-5 mb-5">
                    Naviga e scopri
                </h3>
                <h4 class="t-blue mt-4">
                    In questo sito potrai leggere le ultime notizie, aggiunte dai vari utenti, riguardanti temi di
                    attualità e non solo, per rimanere sempre aggiornato sulle ultime notizie.
                </h4>
                <h4 class="t-blue mt-4">
                    Carica anche tu una notizia in tempo reale per aggiornare gli altri utenti su ciò che succede nel
                    mondo!
                </h4>
                <h4 class="t-blue mt-5">
                    @foreach ($categories as $category)
                        <a href="{{ route('article.byCategory', $category->id) }}"
                            class="mx-3 text-capitalize fw-bold text-muted">{{ $category->name }}</a>
                    @endforeach
                </h4>
            </div>
        </div>
    </div>


    <div class="container-fluid ">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h3 class="t-blue display-1 mt-5 mb-3">
                    Gli ultimi articoli aggiunti
                </h3>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-evenly text-center">
            @foreach ($articles as $article)
                    <x-card :article="$article"/>
            @endforeach
        </div>
    </div>

    <div class="container-fluid ">
        <div class="row justify-content-center">
            <div class="col-7 text-center">
                <h3 class="t-blue display-1 mt-5 mb-3">
                    Chi siamo
                </h3>
                <h4 class="t-blue mt-4">
                    Gruppo di perplessi con tante domande ed altrettante risposte!
                </h4>
            </div>
        </div>
    </div>

    <div class="container margineChiSiamo">
        <div class="row">
            <div class="col-12 col-lg-6 mb-5 d-flex justify-content-center align-items-center">
                <div id="circle">
                    <div id="opener"
                        class="borderOpener1 d-flex align-items-center justify-content-center text-center">
                        <i class="text-white fa-solid fa-plus fa-3x"></i>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 mt-md-0 d-flex align-items-center justify-content-center">
                <div id="quattroCard" class="card d-none" style="width: 18rem;">
                    <img id="cardImg" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 id="cardTitle" class="card-title t-blue">Nome e cognome</h5>
                        <p id="cardDescription" class="card-text t-blue ">Descrizione</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
