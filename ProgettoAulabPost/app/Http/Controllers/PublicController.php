<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Nette\Schema\Expect;
use Illuminate\Http\Request;
use App\Mail\CareerRequestMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PublicController extends Controller implements HasMiddleware
{
    public function home() {

        $articles = Article::where('is_accepted', true)->orderBy('created_at' , 'desc')->take(4)->get();

        return view('welcome', compact('articles'));
    }
    public function careers () {
        return view('careers');
    } 
    public static function middleware()
    {
        return [
            new Middleware ('auth' , except: ['home']) ,
        ];
    }
    public function careersSubmit (Request $request){
        $request->validate([
        'role'=> 'required',
        'email'=> 'required|email',
        'message'=> 'required',


        ]);
        $user = Auth::user();
        $role = $request->role;
        $email = $request->email;
        $message = $request->message;
        $info = compact('role','email','message');

        Mail::to('domifont34@email.com')->send(new CareerRequestMail($info));

        switch ($role){
            case 'admin':
                $user->is_admin = NULL;
                break;
                case 'revisor':
                    $user->is_revisor = NULL;
                    break;
                    case 'writer':
                        $user->is_writer = NULL;
                        break;
        }
        $user->update();
        return redirect(route('home'))->with('message', 'Mail inviata con successo!');
    }
}
