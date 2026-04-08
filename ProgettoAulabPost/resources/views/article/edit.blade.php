<x-layout>
    <div class="container-fluid p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1 t-blue">
                    Modifica articolo: {{$article->title}}
                </h1>
            </div>
        </div>
    </div>
    <div class="container-fluid ">
        <div class="row justify-content-center">
            <div class="col-8 rounded mt-3">
                <form class="m-4" action="{{route('article.update', $article)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{$article->title}}">
                        @error('title')
                            <span class="alert alert-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Sottotitolo</label>
                        <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{$article->subtitle}}">
                        @error('subtitle')
                            <span class="alert alert-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Descrizione</label>
                        <textarea name="body" cols="30" rows="10" class="form-control" id="body">{{$article->body}}</textarea>
                        @error('body')
                            <span class="alert alert-danger"> {{ $message }} </span>
                        @enderror
                    <div class="my-3">
                        <label for="tags" class="tags mb-2 form-lable">Tags</label>
                        <input type="text" name="tags" class="form-control" id="tags" value="{{$article->tags->implode('name', ', ')}}">
                        <span class="small text-muted fst-italic">Dividi ogni tag con una virgola</span>
                        @error('tags')
                            <span class="alert alert-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Categoria</label>
                        <select name="category" id="category" class="form-control">
                            <option selected disabled>Scegli categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if($article->category_id == $category->id) selected @endif>{{$category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <span class="alert alert-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="mb-3">Immagine attuale</label>
                        <img src="{{Storage::url($article->img)}}" alt="{{$article->title}}" class="w-50 d-flex">
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Nuova immagine</label>
                        <input type="file" class="form-control" name="img" id="img">
                    </div>
                    <button type="submit" class="btn btn-perso mt-3">Modifica articolo</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
