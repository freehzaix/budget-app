@extends('auth.include.layout')

@section('titlePage')
    Mon profil
@endsection

@section('contentPage')
    <div class="row">
        <div class="col-md-6">
            <div class="">
                <div class="ml-4 mr-4">
                    <h3 class="mt-3 mb-3"><u>Modifier mon profil</u></h2>
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Adresse mail</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Adresse mail"
                                name="email" disabled value="{{ Auth::user()->email }}">
                        </div>
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" placeholder="Nom"
                                name="nom" value="{{ Auth::user()->nom }}">
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control" id="prenom" placeholder="Prénom"
                                name="prenom" value="{{ Auth::user()->prenom }}">
                        </div>
                        <div class="form-group">
                            <label for="telephone">Numéro de téléphone</label>
                            <input type="text" class="form-control" id="telephone" placeholder="(+225) 07 47 93 84 82"
                                name="telephone" value="{{ Auth::user()->telephone }}">
                        </div>
                        <div class="form-group">
                            <label for="adresse">Adresse géographique</label>
                            <input type="text" class="form-control" id="adresse" placeholder="Adresse géographique"
                                name="adresse" value="{{ Auth::user()->adresse }}">
                        </div>
                        <div class="form-group">
                            <label for="ville">Ville</label>
                            <input type="text" class="form-control" id="ville" placeholder="Ville"
                                name="ville" value="{{ Auth::user()->ville }}">
                        </div>
                        <div class="form-group">
                            <label for="pays">Pays</label>
                            <input type="text" class="form-control" id="pays" placeholder="Pays"
                                name="pays" value="{{ Auth::user()->pays }}">
                        </div>
                        
                        <input type="submit" class="mb-3  btn btn-primary" value="Enregistrer mes informations">
                        
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="ml-4 mr-4">
                    <h2 class="mt-3">Modifier votre avatar</h2>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="file" class="form-control" name="avatar">
                        </div>
                        <input type="submit" class="mb-3  btn btn-primary" value="Téléverser">
                    </form>
                </div>
            </div>
            <div class="ml-3 mr-3">
                <h2 class="mt-5">Modifier votre mot de passe</h2>
                <form action="#" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="password1" placeholder="Nouveau mot de passe">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="password2" placeholder="Re-tapez le nouveau mot de passe">
                    </div>
                    <input type="submit" class="mb-3  btn btn-primary" value="Changer le mot de passe">
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <hr />
    </div>

    <div class="row">

    </div>
@endsection
