<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepenseController extends Controller
{
    //Formulaire du dépense
    public function form_depense()
    {
        $depenses = Transaction::where('type_id', 4)
                                    ->where('user_id', Auth::user()->id)
                                    ->whereYear('created_at', now()->year)
                                    ->whereMonth('created_at', now()->month)
                                    ->orderByRaw('id DESC')
                                    ->paginate(5)->fragment('transactions');
                                    
        $depenses2 = Transaction::where('type_id', 4)
                                    ->where('user_id', Auth::user()->id)
                                    ->whereYear('created_at', now()->year)
                                    ->whereMonth('created_at', now()->month)
                                    ->orderByRaw('id DESC')
                                    ->get();
        return view('auth.depense', [
            'depenses' => $depenses,
            'depenses2' => $depenses2,
        ]);
    }

    //Traitement du formulaire dépense en post
    public function handle_depense(Request $request)
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
        $depense->type_id = 4;
        $depense->user_id = Auth::user()->id;
        $depense->save();

        return redirect()->back()->with('status', 'La dépense a bien été enregistré.');
    }
    

}
