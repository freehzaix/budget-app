<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BudgetFixeController extends Controller
{
    //Formulaire du budget fixe
    public function form_budgetfixe()
    {
        $budgetfixes = Transaction::where('type_id', 1)
                                    ->where('user_id', Auth::user()->id)
                                    ->orderByRaw('id DESC')
                                    ->paginate(5)->fragment('transactions');
        return view('auth.budgetfixe', ['budgetfixes' => $budgetfixes]);
    }

    //Traitement du formulaire budget fixe en post
    public function handle_budgetfixe(Request $request)
    {
        $request->validate([
            'motif' => 'required',
            'montant' => 'required',
        ]);

        if($request->montant <= 0){
            return redirect()->back()->with('erreurMontant', 'Attention ! Le montant doit être suppérieur à zéro.');
        }

        $budgetfixe = new Transaction();
        $budgetfixe->motif = $request->motif;
        $budgetfixe->montant = $request->montant;
        $budgetfixe->type_id = 1;
        $budgetfixe->user_id = Auth::user()->id;
        $budgetfixe->save();

        return redirect()->route('auth.budgetfixe')->with('status', 'Le budget a bien été enregistré.');
    }

    //Supprimer un budget fixe
    public function delete_budgetfixe($id)
    {
        $budgetfixe = Transaction::find($id);
        $budgetfixe->delete();

        return redirect()->route('auth.budgetfixe')->with('status', 'Ce budget a bien été supprimé.');
    }

}
