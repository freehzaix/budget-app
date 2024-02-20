<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RevenuController extends Controller
{
    //Formulaire du revenu
    public function form_revenu()
    {
        $revenus = Transaction::where('type_id', 3)
                                    ->where('user_id', Auth::user()->id)
                                    ->whereYear('created_at', now()->year)
                                    ->whereMonth('created_at', now()->month)
                                    ->orderByRaw('id DESC')
                                    ->paginate(5)->fragment('transactions');

        $revenus2 = Transaction::where('type_id', 3)
                                    ->where('user_id', Auth::user()->id)
                                    ->whereYear('created_at', now()->year)
                                    ->whereMonth('created_at', now()->month)
                                    ->orderByRaw('id DESC')
                                    ->get();

        return view('auth.revenu', [
            'revenus' => $revenus,
            'revenus2' => $revenus2,
        ]);
    }

    //Traitement du formulaire revenu en post
    public function handle_revenu(Request $request)
    {
        $request->validate([
            'motif' => 'required',
            'montant' => 'required',
        ]);

        if($request->montant <= 0){
            return redirect()->back()->with('erreurMontant', 'Attention ! Le montant doit être suppérieur à zéro.');
        }

        $revenu = new Transaction();
        $revenu->motif = $request->motif;
        $revenu->montant = $request->montant;
        $revenu->type_id = 3;
        $revenu->user_id = Auth::user()->id;
        $revenu->save();

        return redirect()->back()->with('status', 'Le budget a bien été enregistré.');
    }


}
