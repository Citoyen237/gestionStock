@extends('layout.app')
@section('title', 'nouvelle vente')
@section('contenu')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Bon de commande</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Achats</li>
                    <li class="breadcrumb-item active">Nouveau</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="card">
                <h5 class="card-title p-4">
                    Code du bon : A0{{ $facture_id }} <br>
                    Motant total =
                    <button>{{ $totalr }}</button>FCFA<br>
                    <ul></ul>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                        @endforeach
                    @endif
                    </ul>
                </h5>
            </div>
            <div class="card">
                <div class="card-body">
                    <form class="row g-3 p-4" method="post" action="{{ route('newachat.store') }}">
                        @csrf
                        <div class="col-md-3 ">
                            <label for="inputCity" class="form-label">Nom:</label>
                            <select id="inputState" class="form-select" name="produit_id">
                                <option></option>
                                @foreach ($produits as $produit)
                                    <option value="{{ $produit->id }}">{{ $produit->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="inputState" class="form-label">Description:</label>
                            <select id="inputState" class="form-select" name="designation">
                                <option value=""></option>
                                @foreach ($produits as $produit)
                                    <option value="{{ $produit->id }}">{{ $produit->description }}
                                    </option>
                                @endforeach
                                <option></option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="inputZip" class="form-label">Prix_U:</label>
                            <input type="number" class="form-control" id="inputZip" required name="prixu">
                        </div>
                        <div class="col-md-2">
                            <label for="inputZip" class="form-label">Quandite:</label>
                            <input type="number" class="form-control" id="inputZip" required name="quandite">
                        </div>
                        <div class="col-md-1 p-2">
                            <br>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form><!-- End Multi Columns Form -->
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Elements du bon</h5>
                            <!-- Active Table -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Quandite</th>
                                        <th scope="col">Prix_U</th>
                                        <th scope="col">Prix Total</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($commandes as $commande)
                                        <tr>

                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $commande->produit->nom }}</td>
                                            <td>{{ $commande->produit->description }}</td>
                                            <td>{{ $commande->quandite }}</td>
                                            <td>{{ $commande->prixu }}</td>
                                            <td>{{ $commande->total }}</td>
                                            <td>
                                                <a href="#" class="btn btn-danger"
                                                    onclick="if(confirm('Voulez vraiment supprimer ce produit?')){document.getElementById('form-{{ $commande->id }}').submit()}"><i
                                                        class='bi bi-trash-fill'></i></a>
                                                <form id="form-{{ $commande->id }}"
                                                    action="{{ route('achat.delete', ['commande' => $commande->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="delete">
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse

                                </tbody>
                            </table>
                            <!-- End Tables without borders -->
                            <form action="{{ route('facturationA.validation') }}" method="post">
                                @csrf
                                <div class="col-md-6 mx-auto">
                                 <p><b>Nom du fournisseur :</b> </p><select name="client_id" id="" class="form-select">
                                      <option value=""></option>
                                        @foreach ($clients as $client)
                                         <option value="{{ $client->id }}">{{ $client->nom }}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" class="total" value="{{ $totalr }}" name="total">
                                    <input type="hidden" name="type" value="achat">
                                    <input type="hidden" name="code_fac" value="{{ $facture_id }}"><br>
                                    <button type="submit" class="btn btn-primary form-control">Valider la vente</button>
                                </div>
                            </form>

        </section>

    </main><!-- End #main -->
@endsection
