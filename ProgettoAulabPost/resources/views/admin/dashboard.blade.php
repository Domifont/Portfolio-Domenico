<x-layout>
    <div class="container-fluid p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1 t-blue">
                    Bentornato Amministratore: {{Auth::user()->name}}
                </h1>
            </div>
        </div>
    </div>
    @if (session('messagge'))
    <div class="alert alert-primary">
        {{session('messagge')}}
    </div>
    @endif
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="t-blue">
                    Richieste per il ruolo di Amministratore
                </h2>
                <x-requests-table :roleRequests="$adminRequests" role="Amministratore"/>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="t-blue">
                    Richieste per il ruolo di Revisore
                </h2>
                <x-requests-table :roleRequests="$revisorRequests" role="Revisore"/>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="t-blue">
                    Richieste per il ruolo di Redattore
                </h2>
                <x-requests-table :roleRequests="$writerRequests" role="Redattore"/>
            </div>
        </div>
    </div>
    <hr> 
    <div class="container my-5">
        <div class="row justify—content—center"> 
            <div class="col-12">
                <h2 class="t-blue">Tutti i tags</h2> 
                <x-metainfo-table :metaInfos="$tags" metaType="tags"/>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify—content—center"> 
            <div class="col-12">
                <h2 class="t-blue">Tutte le categorie</h2> 
                <form action="{{route('admin.storeCategory')}}" method="POST" class="w-50 d-flex mt-3">
                    @csrf
                    <input type="text" name="name" class="form-control me-2" placeholder="Inserisci una nuova categoria">
                    <button type="submit" class="btn btn-perso">Inserisci</button>
                </form>
                <x—metainfo—table :metaInfos="$categories" metaType="categorie"/> 
            </div>
        </div>
    </div>
    
    
    
</x-layout>