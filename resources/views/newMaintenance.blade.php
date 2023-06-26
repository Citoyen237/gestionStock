@extends('layout.app')
@section('title', 'Appareils')
@section('contenu')
    <main id="main" class="main">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ajouter un appariel pour Maintenance</h5>
                @if ($errors->any())
                   <ul type="square">
                    @foreach ($errors->all() as $error)
                     <li class="text-danger">{{ $errors  }}</li>
                    @endforeach
                   </ul>

                @endif
                <!-- Multi Columns Form -->
                <form class="row g-3" method="post" action="{{ route('maintenance.store') }}" autocomplete="off">
                    @csrf
                    <div class="col-md-12">
                        <label for="inputName5" class="form-label">Nom du client:</label>
                        <select name="client_id" id="" class="form-select">
                            <option value=""></option>
                            @foreach ($clients as $client)
                              <option value="{{ $client->id }}">{{ $client->nom." ".$client->prenom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="input" class="form-label">Nom l'appariel:</label>
                        <input type="text" class="form-control" id="input" name="nom" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword5" class="form-label">Numero de serie:</label>
                        <input type="text" class="form-control" id="inputPassword5" name="serie">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress5" class="form-label">Travaille effectuer:</label>
                        <textarea name="taff_effectuer" id="" cols="" rows="" class="form-control"></textarea>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Prix:</label>
                        <input type="number" class="form-control" id="inputAddress2" placeholder="" name="montant"
                            required>
                    </div>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
            <br>
            </form><!-- End Multi Columns Form -->

        </div>
        </div>

        </div>


        </section>

    </main>

@endsection
