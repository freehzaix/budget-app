@extends('auth.include.layout')

@section('titlePage')
    Revenu
@endsection

@php
    $totalRevenu = 0;
@endphp

@foreach ($revenus2 as $row)
    @php
        $totalRevenu = $totalRevenu + $row['montant'];
    @endphp
@endforeach

@section('contentPage')
    <div class="row">
        <div class="col-md-9"></div>
        <div class="col-md-3">
            <h3 class="ml-4"><i class="fas fa-money-bill nav-icon"></i> : {{ $totalRevenu }} FCFA</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="">
                <div class="ml-4 mr-4">
                    <h3 class="mt-3 mb-3"><u>Revenu</u></h2>
                    @if(session('status'))
                        <div class="alert alert-success"> {{ session('status') }} </div>
                    @endif
                    @if(session('erreurMontant'))
                        <div class="alert alert-danger"> {{ session('erreurMontant') }} </div>
                    @endif
                    <form action="{{ route('auth.revenu.post') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="motif">Motif</label>
                            <input type="text" class="form-control @error('motif') is-invalid @enderror" id="motif" placeholder="Motif"
                                name="motif" value="{{ old('motif') }}">
                        </div>
                        <div class="form-group">
                            <label for="montant">Montant (en fcfa)</label>
                            <input type="number" class="form-control @error('montant') is-invalid @enderror" id="montant" placeholder="Montant"
                                name="montant" value="{{ old('montant') }}">
                        </div>
                        <input type="submit" class="mb-3  btn btn-primary" value="Ajouter le revenu">
                        
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
        <hr />
        
        <table class="table">
            <thead>
              <tr>
                <th style="width: 50px">#</th>
                <th style="width: 300px">Motif</th>
                <th style="width: 150px">Montant (en fcfa)</th>
                <th style="width: 120px">Date</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $ite = 1;
                @endphp
            @foreach ($revenus as $row)
              <tr>
                <td> {{ $ite }} </td>
                <td> {{ $row['motif'] }} </td>
                <td> {{ $row['montant'] }} FCFA</td>
                <td> {{ date_format($row['created_at'], 'd/m/Y') }}</td>
                <td>
                    <a href="{{ route('auth.transaction.show', $row['id']) }}" class="btn btn-primary"><i class="fas fa-pen nav-icon"></i></a> 
                    <a href="{{ route('auth.transaction.delete', $row['id']) }}" class="btn btn-danger"><i class="fas fa-trash nav-icon"></i></a>
                </td>
              </tr>
              @php
                  $ite += 1;
              @endphp
            @endforeach
            </tbody>
          </table>
          {{ $revenus->links() }}
    </div>

    <div class="row">

    </div>
@endsection
