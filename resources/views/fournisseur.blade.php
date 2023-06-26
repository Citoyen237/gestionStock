@extends('layout.app')
@section('title', 'fournisseur')
@section('contenu')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Gestion les Fournisseurs</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item">Fournisseurs</li>
                    <li class="breadcrumb-item active">Liste</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Fournisseurs
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i
                                        class="bi bi-person-plus-fill"></i></button>
                                <a href="listef.php" class="btn btn-warning"><i class="bi bi-printer-fill"></i></a>
                            </h5>
                            @if ($errors->any())
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-danger">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Nom entreprise</th>
                                        <th scope="col">Nom du directeur</th>
                                        <th scope="col">Telephone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Adresse</th>
                                        <th scope="col">utilisateur</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fournisseurs as $fournisseur)
                                        <tr>
                                            <th>{{ $fournisseur->created_at }}</th>
                                            <td>{{ $fournisseur->nom }}</td>
                                            <td>{{ $fournisseur->prenom }}</td>
                                            <td>{{ $fournisseur->telephone }}</td>
                                            <td>{{ $fournisseur->email }}</td>
                                            <td>{{ $fournisseur->adresse }}</td>
                                            <td>{{ $fournisseur->user->name}}</td>
                                            <form method='post' action='fournisseurs.php'>
                                                <td class='text-center'><button type='submit' name='modifier'
                                                        class=' btn btn-primary'><i
                                                            class='bi bi-pencil-square'></i></button>
                                                    <button type='submit' class=' btn btn-danger' name='supprimer'><i
                                                            class='bi bi-trash-fill'></i></button>
                                                </td>
                                                <input type='hidden' value='$id' name='id'>
                                            </form>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">Ajouter un fournisseur</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" method="post" action="{{ route('fournisseur.store') }}" autocomplete="off">
                            @csrf
                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Nom de l'entreprise:</label>
                                <input type="text" class="form-control" id="inputName5" name="nom" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail5" class="form-label">Nom du directeur:</label>
                                <input type="text" class="form-control" id="inputEmail5" name="prenom" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword5" class="form-label">Adresse email:</label>
                                <input type="mail" class="form-control" id="inputPassword5" name="email" required>
                            </div>
                            <div class="col-12">
                                <label for="inputAddress5" class="form-label">Telephone:</label>
                                <input type="text" class="form-control" id="inputAddres5s" placeholder=""
                                    name="telephone" required>
                            </div>
                            <div class="col-12">
                                <label for="inputAddress2" class="form-label">Adresse:</label>
                                <input type="text" class="form-control" id="inputAddress2" placeholder="ville/quartier"
                                    name="adresse" required>
                            </div>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <!-- End Multi Columns Form -->

                            <div class="modal-footer">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary form-control">Ajouter</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
