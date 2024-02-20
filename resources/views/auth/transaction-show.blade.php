@extends('auth.include.layout')

@section('titlePage')
    Modification de la transaction
@endsection


@section('contentPage')
    <div class="row">
        <div class="col-md-6">
            <div class="">
                <div class="ml-4 mr-4">
                    <h3 class="mt-3 mb-3"><u>@yield('titlePage')</u></h2>
                    @if(session('status'))
                        <div class="alert alert-success"> {{ session('status') }} </div>
                    @endif
                    @if(session('erreurMontant'))
                        <div class="alert alert-danger"> {{ session('erreurMontant') }} </div>
                    @endif
                    <form action="{{ route('auth.transaction.post') }}" method="post">
                        @csrf
                        <input type="text" name="id" value="{{ $transaction->id }}" style="display: none;">
                        <div class="form-group">
                            <label for="motif">Motif</label>
                            <input type="text" class="form-control @error('motif') is-invalid @enderror" id="motif" placeholder="Motif"
                                name="motif" value="{{ $transaction->motif }}">
                        </div>
                        <div class="form-group">
                            <label for="montant">Montant (en fcfa)</label>
                            <input type="number" class="form-control @error('montant') is-invalid @enderror" id="montant" placeholder="Montant"
                                name="montant" value="{{ $transaction->montant }}">
                        </div>
                        <input type="submit" class="mb-3  btn btn-primary" value="Enregistrer les modifications">
                        
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <br /> <br />
            <a href="https://www.facebook.com/profile.php?id=61555612161998" target="_blank">
                <img src="{{ asset('images/espace-pub.jpg') }}" width="95%" alt="espace pub">
            </a>
        </div>
    </div>

    <div class="row ml-4 mr-4">
       
    </div>

    <div class="row">

    </div>
@endsection
