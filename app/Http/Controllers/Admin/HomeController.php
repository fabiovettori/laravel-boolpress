<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function token()
    {
        $token = Str::random(80); //genero un token da 80 caratteri
        $logged_user = Auth::user(); //prendo l'utente corrente
        // dd($logged_user);
        $logged_user->api_token = $token; //assegno all'utente corrente il token appena generato
        $logged_user->update(); //salvo nel db
        // faccio il redirect alla pagina di profile dello user
        return redirect()->route('admin.profile');
    }
}
