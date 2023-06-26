@extends('layout.app')
@section('title', 'nouvelle vente')
@section('contenu')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Vente au comptoire</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Ventes</li>
                    <li class="breadcrumb-item active">Nouveau</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="card">
                <h5 class="card-title p-4">
                    Total commande =
                    <button>5000</button>FCFA
                </h5>
            </div>
            <div class="card">
                <div class="card-body">
                    <form class="row g-3 p-4" method="post" action="adcom.php">
                        <div class="col-md-3 ">
                            <label for="inputCity" class="form-label">Client:</label>
                            <select id="inputState" class="form-select" name="fournisseur">
                                <option></option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->nom . ' ' . $client->prenom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="inputState" class="form-label">Desigantion:</label>
                            <select id="inputState" class="form-select" name="designation">
                                <option value=""></option>
                                @foreach ($produits as $produit)
                                    <option value="{{ $produit->id }}">{{ $produit->nom . '/' . $produit->description }}
                                    </option>
                                @endforeach
                                <option></option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="inputZip" class="form-label">Prix_U:</label>
                            <input type="number" class="form-control" id="inputZip" required name="prixU">
                        </div>
                        <div class="col-md-2">
                            <label for="inputZip" class="form-label">Quandite:</label>
                            <input type="number" class="form-control" id="inputZip" required name="quandite">
                        </div>
                        <div class="col-md-1 p-2">
                            <br>
                            <button type="submit" class="btn btn-primary" name="ajouterv">Ajouter</button>
                        </div>
                    </form><!-- End Multi Columns Form -->
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Elements de la commande</h5>
                            <!-- Active Table -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Client</th>
                                        <th scope="col">Desigantion</th>
                                        <th scope="col">Quandite</th>
                                        <th scope="col">Prix_U</th>
                                        <th scope="col">Prix Total</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                        </td>
                                        <td>
                                            <form action="NewVente.php" method="post">
                                                <button type="submit" class="btn btn-danger" name="supprimer"><i
                                                        class='bi bi-trash-fill'></i></button>
                                        </td>
                                        <td><input type="hidden" name="idcs" value="">
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- End Tables without borders -->
                            <form action="adcom.php" method="post">
                                <div class="">
                                    <button type="submit" class="btn btn-primary" name="valider1">Valider la vente</button>
                                </div>
                            </form>

        </section>

    </main><!-- End #main -->
@endsection
