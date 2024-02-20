<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //Afficher le formulaire de Login
    public function form_login()
    {
        return view('auth.login');
    }

    //traitement Login
    public function handle_login(LoginRequest $request): RedirectResponse
    {
        //Traitement du formulaire de connexion
        $validated = $request->validated();

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Vos identifiants de connexion sont incorrects.',
        ])->onlyInput('email');

    }

    //Afficher le formulaire de Register
    public function form_register()
    {
        return view('auth.register');
    }

    //traitement Register
    public function handle_register(RegisterRequest $request): RedirectResponse
    {
        //Traitement du formulaire d'Inscription 
        $validated = $request->validated();
        
        if($validated){
            if($request->password == $request->password2){
                $user = new User(); //Créer une instance de User()
                $user->nom = $request->nom; //Lié les champs du formulaire à l'objet
                $user->prenom = $request->prenom;
                $user->email = $request->email;
                $user->password = Hash::make($request->password); //Hasher le mot de passe
                $user->save();

                return redirect()->route('auth.login')->with('status', 'Votre compte a bien été créé.');
            }else{
                return redirect()->route('auth.register')->with('statusError', 'Le mot de passe est inccorrect.');
            }
        }else{
            return redirect()->route('auth.register');
        }

    }

    //Formulaire Dashboard
    public function form_dashboard()
    {
        $budgetfixes = Transaction::where('type_id', 1)
                                    ->where('user_id', Auth::user()->id)
                                    ->whereYear('created_at', now()->year)
                                    ->whereMonth('created_at', now()->month)
                                    ->limit(1)
                                    ->orderByRaw('id DESC')
                                    ->get();
        
        $revenus = Transaction::where('type_id', 3)
                                    ->where('user_id', Auth::user()->id)
                                    ->whereYear('created_at', now()->year)
                                    ->whereMonth('created_at', now()->month)
                                    ->get();
        
        $depenses = Transaction::where('type_id', 4)
                                    ->where('user_id', Auth::user()->id)
                                    ->whereYear('created_at', now()->year)
                                    ->whereMonth('created_at', now()->month)
                                    ->get();
        
        $epargnes = Transaction::where('type_id', 5)
                                    ->where('user_id', Auth::user()->id)
                                    ->whereYear('created_at', now()->year)
                                    ->whereMonth('created_at', now()->month)
                                    ->get();

        return view('auth.dashboard', [
            'budgetfixes' => $budgetfixes,
            'revenus' => $revenus,
            'depenses' => $depenses,
            'epargnes' => $epargnes,
        ]);
    }

    //Formulaire de Déconnexion
    public function form_logout(Request $request): RedirectResponse
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect()->route('auth.login');
    }

    //Afficher la vue Mon profil
    public function form_monprofil()
    {
        return view('auth.monprofil');
    }

}
