@extends('layout.app')
@section('title', 'modifier')
@section('contenu')
    <main id="main" class="main">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Modifier le produit</h5>
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <!-- Multi Columns Form -->
                <div class="col-md-12">
                    <form class='row g-3' action="{{ route('produit.update', ['produit' => $produit->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="put">
                        <div class='col-md-12'>
                            <label for='inputName5' class='form-label'>Nom:</label>
                            <input type='text' class='form-control' id='inputName5' name='nom' required
                                value='{{ $produit->nom }}'>
                        </div>
                        <div class='col-md-6'>
                            <label for='inputEmail5' class='form-label'>Quandite:</label>
                            <input type='number' class='form-control' id='inputEmail5' name='quandite' required
                                value='{{ $produit->quandite }}'>
                        </div>
                        <div class='col-md-6'>
                            <label for='inputPassword5' class='form-label'>Quandite minimale:</label>
                            <input type='number' class='form-control' id='inputPassword5' name='quan_min'
                                value='{{ $produit->quan_min }}'>
                        </div>
                        <div class='col-12'>
                            <label for='inputAddress5' class='form-label'>Description:</label>
                            <textarea name='description' id='' cols='' rows='' class='form-control'>{{ $produit->description }}</textarea>
                        </div>
                        <div class='col-12'>
                            <label for='inputAddress2' class='form-label'>Prix:</label>
                            <input type='number' class='form-control' id='inputAddress2' placeholder='' name='prix'
                                required value='{{ $produit->prix }}'>
                        </div>
                        <div class="col-12">
                            <label for='categorie' class='form-label'>Categorie:</label>
                            <select name="categorie_id" id="categorie" class="form-select">
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class='text-center'>
                            <button type='submit' class='btn btn-primary'>Mettre a jour</button>
                        </div>
                    </form>


                </div>
            </div>

        </div>


        </section>

    </main>
@endsection
