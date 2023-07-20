@extends('layout.app')
@section('title', 'client')
@section('contenu')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Gestion des clients</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item">Clients</li>
                    <li class="breadcrumb-item active">Liste</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Clients
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" data-bs-whatever="@mdo">Ajouter</button>
                                <a href="{{ route('pdf.client') }}" class="btn btn-warning"><i class="bi bi-printer-fill"></i></a>
                            </h5>
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            @endif

                            @if (session()->has('successCreate'))
                                {{-- <div class="alert alert-success">
                                    <h3>{{ session()->get('successDelete') }}</h3>
                                </div> --}}
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="bi bi-check-circle me-1"></i>
                                    {{ session()->get('successCreate') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nom & Prenom</th>
                                        <th scope="col">Telephone</th>
                                        <th scope="col">NB commande</th>
                                        <th scope="col">Date</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($clients as $client)
                                        <tr>
                                            <th scope='row'>{{ $loop->index + 1 }}</th>
                                            <td>{{ $client->nom . ' ' . $client->prenom }}</td>
                                            <td>{{ $client->telephone }}</td>
                                            <td>{{ $client->facture2s->count() }}</td>
                                            <td>{{ $client->created_at->format('d-m-Y') }}</td>
                                            <form method='post' action='Clients.php'>
                                                <td class='text-center'>
                                                    <button type='submit' name='modifier' class=' btn btn-primary'><i
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


            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel">Ajouter un client</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route('client.store') }}">
                                @csrf
                                <div class="mb-2">
                                    <label for="recipient-name" class="col-form-label">Nom:</label>
                                    <input type="text" class="form-control" id="recipient-name" required
                                        placeholder="numero de telephone" name="nom">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="col-form-label">Prenom:</label>
                                    <input type="text" class="form-control" id="message-text" required
                                        placeholder="prenom" name="prenom">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="col-form-label">Telephone:</label>
                                    <input type="number" class="form-control" id="message-text" required
                                        placeholder="+237 685 824 012" name="telephone">
                                </div>
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            </div>
            </div>
        </section>
    </main>
@endsection
