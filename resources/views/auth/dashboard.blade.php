@extends('auth.include.layout')

@section('titlePage')
    Tableau de bord
@endsection

@php
    $totalFixe = 0;
@endphp

@php
    $totalDepense = 0;
@endphp

@php
    $totalRevenu = 0;
@endphp

@php
    $totalEpargne = 0;
@endphp

@foreach ($depenses as $row)
    @php
        $totalDepense += $row['montant'];
    @endphp
@endforeach

@foreach ($epargnes as $row)
    @php
        $totalEpargne += $row['montant'];
    @endphp
@endforeach

@foreach ($revenus as $row)
    @php
        $totalRevenu += $row['montant'];
    @endphp
@endforeach

@foreach ($budgetfixes as $row)
    @php
        $totalFixe += $row['montant'];
    @endphp
@endforeach

@php
    $totalRevenu = $totalRevenu - $totalDepense - $totalEpargne;
@endphp

@section('contentPage')
    <div class="row">
        <div class="col-md-6 text-center">
            <div class="card">
                <div class="card-content">
                    <h2 class="text-center mt-3">Bugdet fixe</h2>
                    <h3 class="text-center mt-3 ml-3 mr-3 alert alert-info">
                        {{ $totalFixe - $totalDepense }} FCFA/mois
                    </h3>
                    <a href="{{ route('auth.budgetfixe') }}" class="mb-3 btn btn-primary">Mettre à jour</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <div class="card">
                <div class="card-content">
                    <h2 class="text-center mt-3">Budget prévisionnel</h2>
                    <h3 class="text-center mt-3 ml-3 mr-3 alert alert-success">0 FCFA/mois</h3>
                    <a href="#" class="mb-3  btn btn-primary">Mettre à jour</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <hr />
    </div>

    <div class="row">
        <div class="col-md-4 text-center">
            <h2 class="text-center mt-3"><i class="fas fa-money-bill nav-icon"></i> Revenu</h2>
            <h3 class="text-center mt-3 ml-3 mr-3 alert alert-info">
                {{ $totalRevenu }} FCFA
            </h3>
            <a href="{{ route('auth.revenu') }}" class="mb-3 btn btn-primary">Ajouter un revenu</a>
        </div>
        <div class="col-md-4 text-center">
            <h2 class="text-center mt-3"><i class="fas fa-comments-dollar nav-icon"></i> Dépense</h2>
            <h3 class="text-center mt-3 ml-3 mr-3 alert alert-danger">
                {{ $totalDepense }} FCFA
            </h3>
            <a href="{{ route('auth.depense') }}" class="mb-3  btn btn-primary">Ajouter une dépense</a>
        </div>
        <div class="col-md-4 text-center">
            <h2 class="text-center mt-3"><i class="fas fa-piggy-bank nav-icon"></i> Epargne</h2>
            <h3 class="text-center mt-3 ml-3 mr-3 alert alert-success">
                {{ $totalEpargne }} FCFA
            </h3>
            <a href="{{ route('auth.epargne') }}" class="mb-3  btn btn-primary">Ajouter une épargne</a>
        </div>
    </div>

    <div class="row">

    </div>
@endsection
