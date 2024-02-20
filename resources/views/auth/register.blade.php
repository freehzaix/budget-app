<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.2-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Créer un compte | Budget'App</title>
</head>

<body>

    <!----------------------- Main Container -------------------------->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <!----------------------- Login Container -------------------------->
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <!--------------------------- Left Box ----------------------------->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background: #103cbe;">
                <div class="featured-image mb-3">
                    <img src="{{ asset('images/1.png') }}" class="img-fluid" style="width: 250px;">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">
                    Budget'App</p>
                <small class="text-white text-wrap text-center"
                    style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Prenez conscience, et gérer vos
                    finances personnelles.</small>
            </div>
            <!-------------------- ------ Right Box ---------------------------->

            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-3">
                        <h2>Bienvenu(e) à toi,</h2>
                        <p>
                            @if(session('statusError'))
                                <div class="alert alert-danger">{{ session('statusError') }}</div>
                            @endif
                        </p>
                    </div>
                    <form action="{{ route('auth.register.post') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6 @error('nom') is-invalid @enderror"
                                placeholder="Nom" name="nom" value="{{ old('nom') }}" >
                            @error('nom') <div class="input-group alert alert-danger"> {{ $message }} </div> @enderror
                            
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6 @error('prenom') is-invalid @enderror"
                                placeholder="Prénom" name="prenom" value="{{ old('prenom') }}">
                            @error('prenom') <div class="input-group alert alert-danger"> {{ $message }} </div> @enderror
                            
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6 @error('email') is-invalid @enderror"
                                placeholder="Adresse mail" name="email" value="{{ old('email') }}">
                            @error('email') <div class="input-group alert alert-danger"> {{ $message }} </div> @enderror
                            
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control form-control-lg bg-light fs-6 @error('password') is-invalid @enderror"
                                placeholder="Mot de passe" name="password">
                            @error('password') <div class="input-group alert alert-danger"> {{ $message }} </div> @enderror
                            
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control form-control-lg bg-light fs-6 @error('password2') is-invalid @enderror"
                                placeholder="Confirmez le mot de passe" name="password2">
                            @error('password2') <div class="input-group alert alert-danger"> {{ $message }} </div> @enderror
                            
                        </div>
                        <div class="input-group mb-2 d-flex justify-content-between"> </div>

                        <div class="input-group mb-3">
                            <button class="btn btn-lg btn-primary w-100 fs-6">S'inscrire</button>
                        </div>
                    </form>
                    <div class="row">
                        <small>Déjà un compte? <a href="{{ route('auth.login') }}">Se connecter ici.</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
