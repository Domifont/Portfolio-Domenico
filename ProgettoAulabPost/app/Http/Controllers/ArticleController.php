<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ArticleController extends Controller implements HasMiddleware
{

    public static function middleware(){
        return [
            new Middleware('auth', except:['index', 'show', 'byCategory', 'byUser','articleSearch' ,'byTag']),
            
        ];
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at' , 'desc')->get();

        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
        'title' => 'required|unique:articles|min:5', 
        'subtitle' => 'required|min:5', 
        'body' => 'required|min:10', 
        'img' => 'required|image', 
        'category' => 'required', 
        'tags' => 'required'


    ]);
        $article = Article::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'img' => $request->file('img')->store('public/images'),
            'category_id' => $request->category,
            'user_id' => Auth::user()->id,
            'slug' => Str::slug($request->title),
        ]);


        $tags = explode(',', $request->tags);
        foreach ($tags as $i => $tag) {
            $tags[$i]=trim($tag);
        }
        foreach ($tags as $tag ) {

            $newTag = Tag::updateOrCreate([
                'name'=> strtolower($tag)
            ]);

            $article -> tags ()->attach($newTag);
        }


        return redirect(route('home'))->with('message', 'Articolo creato con successo ma in attesa di revisione');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }


    public function byCategory(Category $category){

        $articles = $category->articles()->where('is_accepted', true)->orderBy('created_at' , 'desc')->get();

        return view('article.by-category', compact('category', 'articles'));
    }

    public function byUser(User $user){

        $articles = $user->articles()->where('is_accepted', true)->orderBy('created_at' , 'desc')->get();

        return view('article.by-user', compact('user', 'articles'));
    }

    public function byTag(Tag $tag){

        $articles = $tag->articles()->where('is_accepted', true)->orderBy('created_at' , 'desc')->get();

        return view('article.by-tag', compact('tag', 'articles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        if(Auth::user()->id == $article->user_id){
            return view('article.edit', compact('article'));
        }
        return redirect()->route('homepage')->with('alert', 'Accesso negato');
    }

    /**
     * Update the specified resource in storage.
     */
    

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|min:5|unique:articles,title,' . $article->id,
            'subtitle' => 'required|min:5', 
            'body' => 'required|min:10', 
            'category' => 'required', 
            'tags' => 'required'
        ]);

        // dd($this->hasTag($request, $article));
        $this->hasTag($request, $article);
        // dd($request->tags, $article->tags);

        if (($request->title == $article->title)&& 
            ($request->subtitle == $article->subtitle)&& 
            ($request->body == $article->body)&& 
            ($request->category == $article->category->id)&&
            $this->hasTag($request, $article)){
            $article->is_accepted = TRUE;
        } else{
            $article->is_accepted = NULL;
        }

        $article->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'category_id' => $request->category,
            'slug' => Str::slug($request->title),
            // 'is_accepted' => NULL
        ]);

        if ($request->img){
            Storage::delete($article->img);
            $article->update([
                'img'=> $request->file('img')->store('public/images')
            ]);
        }

        $tags = explode(',', $request->tags);
        foreach ($tags as $i => $tag) {
            $tags[$i]=trim($tag);
        }
        $newTags=[];
        foreach ($tags as $tag) {
            $newTag = Tag::updateOrCreate([
                'name'=>strtolower($tag)
            ]);
            $newTags[]=$newTag->id;
        }
        $article->tags()->sync($newTags);
        return redirect(route('writer.dashboard'))->with('message', 'Articolo modificato con successo');
    }

    function hasTag($request, $article){
        $tags = explode(',', $request->tags);
        // dd($tags);
        foreach ($tags as $i => $tag) {
            $tags[$i]=trim($tag);
        }

        if (sizeof($article->tags) != sizeof($tags)) {
            return false;
        }

        foreach ($article->tags as $key => $tag) {
            if ($tag->name !== $tags[$key]) {
                return false;
            }
            // dump($tag->name, $tags[$key]);
        }
        return true;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        foreach ($article->tags as $tag) {
            $article->tags()->detach($tag);
        }
        Storage::delete($article->img);
        $article->delete();
        return redirect()->back()->with('message', 'Articolo eliminato con successo'); 
    }

    public function articleSearch(Request $request){
        $query = $request->input('query');
        $articles = Article::search($query)->where('is_accepted' , true)->orderBy('created_at', 'desc')->get();
        
        return view('article.search-index', compact('articles', 'query'));
    }
}
