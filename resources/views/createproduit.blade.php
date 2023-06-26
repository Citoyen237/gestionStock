@extends('layout.app')
@section('title', 'new product')
@section('contenu')
    <main id="main" class="main">
        <section>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ajouter un produit</h5>
                    <!-- Multi Columns Form -->
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="text-danger">{{ $error }}</div>
                        @endforeach

                    @endif
                    <form class="row g-3" method="post" action="{{ route('produit.store') }}" autocomplete="off">
                        @csrf
                        <div class="col-md-12">
                            <label for="inputName5" class="form-label">Nom:</label>
                            <input type="text" class="form-control" id="inputName5" name="nom" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail5" class="form-label">Quantite:</label>
                            <input type="number" class="form-control" id="inputEmail5" name="quandite" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword5" class="form-label">Quandite minimale:</label>
                            <input type="number" class="form-control" id="inputPassword5" name="quan_min">
                        </div>
                        <div class="col-12">
                            <label for="inputAddress5" class="form-label">Description:</label>
                            <textarea name="description" id="" cols="" rows="" class="form-control"></textarea>
                        </div>
                        <div class="col-12">
                            <label for="inputAddress2" class="form-label">Prix:</label>
                            <input type="number" class="form-control" id="inputAddress2" placeholder="" name="prix"
                                required>
                        </div>
                        <div class="col-md-12">
                            <label for="inputState" class="form-label">Categorie:</label>
                            <select id="inputState" class="form-select" name="categorie_id">
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form><!-- End Multi Columns Form -->

                </div>
            </div>

        </section>

    </main>
@endsection
