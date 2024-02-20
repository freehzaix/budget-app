<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.2-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Connexion | Budget'App</title>
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
                        <h2>Bonjour à toi,</h2>
                        <p>
                            Nous sommes content de voir par ici.
                            @if(session('status'))
                                <div class="alert alert-success"> {{ session('status') }} </div>
                            @endif
                            @error('email')
                                <div class="alert alert-danger"> {{ $message }} </div>
                            @enderror
                        </p>
                    </div>
                    <form action="{{ route('auth.login.post') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6"@error('email') is-invalid @enderror"
                            placeholder="Adresse mail" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="input-group mb-1">
                            <input type="password" class="form-control form-control-lg bg-light fs-6" @error('password') is-invalid @enderror"
                            placeholder="Mot de passe" name="password">
                        </div>
                        <div class="input-group mb-3 d-flex justify-content-between mt-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="formCheck">
                                <label for="formCheck" class="form-check-label text-secondary"><small>Se souvenir de moi</small></label>
                            </div>
                            <div class="forgot">
                                <small><a href="#">Mot de passe oublié?</a></small>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <button class="btn btn-lg btn-primary w-100 fs-6">Se connecter</button>
                        </div>
                    </form>
                    <div class="row">
                        <small>Pas encore de compte? <a href="{{ route('auth.register') }}">S'inscrire ici.</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
