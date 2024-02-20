<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BudgetFixeController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\EpargneController;
use App\Http\Controllers\RevenuController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Authentification - Login - Register
Route::get('/login', [AuthController::class, 'form_login'])->name('auth.login');
Route::post('/login/post', [AuthController::class, 'handle_login'])->name('auth.login.post');
Route::get('/register', [AuthController::class, 'form_register'])->name('auth.register');
Route::post('/register/post', [AuthController::class, 'handle_register'])->name('auth.register.post');

//Dashboard - Logout
Route::get('/dashboard', [AuthController::class, 'form_dashboard'])->name('auth.dashboard');
Route::get('/logout', [AuthController::class, 'form_logout'])->name('auth.logout');

//Mon profil
Route::get('/monprofil', [AuthController::class, 'form_monprofil'])->name('auth.monprofil');

//Budget - Fixe - Prévisionnel
Route::get('/budgetfixe', [BudgetFixeController::class, 'form_budgetfixe'])->name('auth.budgetfixe');
Route::post('/budgetfixe/post', [BudgetFixeController::class, 'handle_budgetfixe'])->name('auth.budgetfixe.post');
Route::get('/budgetfixe/delete/{id}', [BudgetFixeController::class, 'delete_budgetfixe'])->name('auth.budgetfixe.delete');

//Revenu
Route::get('/revenu', [RevenuController::class, 'form_revenu'])->name('auth.revenu');
Route::post('/revenu/post', [RevenuController::class, 'handle_revenu'])->name('auth.revenu.post');


//Dépense
Route::get('/depense', [DepenseController::class, 'form_depense'])->name('auth.depense');
Route::post('/depense/post', [DepenseController::class, 'handle_depense'])->name('auth.depense.post');

//Epargne
Route::get('/epargne', [EpargneController::class, 'form_epargne'])->name('auth.epargne');
Route::post('/epargne/post', [EpargneController::class, 'handle_epargne'])->name('auth.epargne.post');

//Modifier ou Supprimer une transaction
Route::get('/transaction/show/{id}', [TransactionController::class, 'show_transaction'])->name('auth.transaction.show');
Route::post('/transaction/post', [TransactionController::class, 'update_transaction'])->name('auth.transaction.post');
Route::get('/transaction/delete/{id}', [TransactionController::class, 'delete_transaction'])->name('auth.transaction.delete');
