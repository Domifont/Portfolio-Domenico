<x-layout>
    <div class="container-fluid p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1 t-blue">
                    Crea articolo {{Auth::user()->name}}
                </h1>
            </div>
        </div>
    </div>
    <div class="container-fluid ">
        <div class="row justify-content-center">
            <div class="col-8 rounded mt-3">
                <form class="m-4" action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Titolo</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        @error('title')
                            <div class="alert alert-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sottotitolo</label>
                        <input type="text" class="form-control" name="subtitle" value="{{ old('subtitle') }}">
                        @error('subtitle')
                            <div class="alert alert-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descrizione</label>
                        <textarea name="body" id="" cols="30" rows="10" class="form-control" value="{{ old('body') }}">{{ old('body') }}</textarea>
                        @error('body')
                            <div class="alert alert-danger"> {{ $message }} </div>
                        @enderror
                    <div class="my-3">
                        <label class="tags mb-2">Tags</label>
                        <input type="text" name="tags" class="form-control" id="tags"  value="{{ old('tags') }}">
                        <span class="small text-muted fst-italic">Dividi ogni tag con una virgola</span>
                        @error('tags')
                            <div class="alert alert-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categoria</label>
                        <select name="category" class="form-control">
                            <option selected disabled>Scegli categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="alert alert-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine</label>
                        <input type="file" class="form-control" name="img" id="img">
                        @error('img')
                            <div class="alert alert-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-perso mt-3">Crea articolo</button>
                </form>
            </div>
        </div>
    </div>


</x-layout>
