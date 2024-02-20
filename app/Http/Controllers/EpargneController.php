<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EpargneController extends Controller
{
    
    //Formulaire de l'épargne
    public function form_epargne()
    {
        $epargnes = Transaction::where('type_id', 5)
                                    ->where('user_id', Auth::user()->id)
                                    ->orderByRaw('id DESC')
                                    ->paginate(5)->fragment('transactions');

        // ->whereYear('created_at', now()->year) = Prendre les entrées de l'année d'aujourd'hui
        $epargnes2 = Transaction::where('type_id', 5)
                                    ->where('user_id', Auth::user()->id)
                                    ->orderByRaw('id DESC')
                                    ->get();

        return view('auth.epargne', [
            'epargnes' => $epargnes,
            'epargnes2' => $epargnes2,
        ]);
    }

    //Traitement du formulaire épargne en post
    public function handle_epargne(Request $request)
    {
        $request->validate([
            'motif' => 'required',
            'montant' => 'required',
        ]);

        if($request->montant <= 0){
            return redirect()->back()->with('erreurMontant', 'Attention ! Le montant doit être suppérieur à zéro.');
        }

        $depense = new Transaction();
        $depense->motif = $request->motif;
        $depense->montant = $request->montant;
        $depense->type_id = 5;
        $depense->user_id = Auth::user()->id;
        $depense->save();

        return redirect()->back()->with('status', 'Votre épargne a bien été enregistré.');
    }

}
