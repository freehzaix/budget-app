<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //Supprimer un revenu
    public function delete_transaction($id)
    {
        $revenu = Transaction::find($id);
        $revenu->delete();

        return redirect()->back()->with('status', 'Cette transaction a bien été supprimé.');
    }

    //Afficher le formulaire de modification d'une transaction
    public function show_transaction($id)
    {
        $transaction = Transaction::find($id);

        return view('auth.transaction-show', ['transaction' => $transaction]);
    }

    //Modifier une transaction en post
    public function update_transaction(Request $request)
    {
        $request->validate([
            'motif' => 'required',
            'montant' => 'required',
        ]);

        $transaction = Transaction::find($request->id);
        $transaction->motif = $request->motif;
        $transaction->montant = $request->montant;
        $transaction->save();

        return redirect()->back()->with('status', 'Cette transaction a bien été modifié.');
    }

}
