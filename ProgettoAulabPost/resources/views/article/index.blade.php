<x-layout>
    <div class="container-fluid bg-secondary-subtle ">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-1 t-blue mt-5 mb-5">Tutti gli articoli</h1>
                <x-searchbar/>
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

</x-layout>