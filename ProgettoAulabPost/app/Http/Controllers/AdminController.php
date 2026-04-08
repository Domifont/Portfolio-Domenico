<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        $adminRequests = User::where('is_admin', NULL)->get();
        $revisorRequests = User::where('is_revisor', NULL)->get();
        $writerRequests = User::where('is_writer', NULL)->get();

        return view('admin.dashboard' , compact('adminRequests', 'revisorRequests', 'writerRequests'));
    }

    public function setAdmin(user $user){
        $user->is_admin = TRUE;
        $user->save();

        return redirect(route('admin.dashboard'))->with('messagge', "Hai reso $user->name Amministratore");
    }

    public function rejectAdmin(user $user){
        $user->is_admin = FALSE;
        $user->save();

        return redirect(route('admin.dashboard'))->with('messagge', "Hai rifiutato $user->name Amministratore");
    }

    public function setRevisor(user $user){
        $user->is_revisor = TRUE;
        $user->save();

        return redirect(route('admin.dashboard'))->with('messagge', "Hai reso $user->name Revisore");
    }

    public function rejectRevisor(user $user){
        $user->is_revisor = FALSE;
        $user->save();

        return redirect(route('admin.dashboard'))->with('messagge', "Hai rifiutato $user->name Revisore");
    }

    public function setWriter(user $user){
        $user->is_writer = TRUE;
        $user->save();

        return redirect(route('admin.dashboard'))->with('messagge', "Hai reso $user->name Redattore");
    }

    public function rejectWriter(user $user){
        $user->is_writer = FALSE;
        $user->save();

        return redirect(route('admin.dashboard'))->with('messagge', "Hai rifiutato $user->name Redattore");
    }

    public function editTag (Request $request, Tag $tag){
    $request->validate ([

        'name'=>'required|unique:tags',
    ]);

    $tag->update([       
        'name' => strtolower($request->name), 
    ]);
    return redirect()->back()->with('message','Tag aggiornato correttamente');
    }

    public function deleteTag(Tag $tag){       
        foreach($tag->articles as $article) {
            $article->tags()->detach($tag);
        }
        $tag->delete();

        return redirect()->back()->with('message','Tag eliminato correttamente');
    }

    public function editCategory (Request $request, Category $category){
        $request->validate ([
        
            'name'=>'required|unique:categories',
        ]);

        $category->update([       
            'name' => strtolower($request->name), 
        ]);
        return redirect()->back()->with('message','Categoria aggiornata correttamente');
        }

        public function deleteCategory(Category $category){       
            $category->delete();
    
            return redirect()->back()->with('message','Categoria eliminata correttamente');
        }
        public function storeCategory(request $request) {
            Category::create([
                'name' => strtolower($request->name),
            ]);
            return redirect()->back()->with('message', 'Categoria inserita correttamente');
        }
}
