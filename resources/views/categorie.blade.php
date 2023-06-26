@extends('layout.app')
@section('title', 'categorie')
@section('contenu')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Categories</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Stocks</li>
                    <li class="breadcrumb-item active">Categories</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Liste de categorie
                                <a href="listeca.php" class="btn btn-warning"><i class="bi bi-printer-fill"></i></a>
                            </h5>
                            @if (session()->has('successDelete'))
                                {{-- <div class="alert alert-success">
                                    <h3>{{ session()->get('successDelete') }}</h3>
                                </div> --}}
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="bi bi-check-circle me-1"></i>
                                    {{ session()->get('successDelete') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <!-- Default Table -->
                            <table class="datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Noms</th>
                                        <th scope="col">Quandites</th>
                                        <th scope="col">Valeur (FCFA)</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $categorie)
                                        <tr>
                                            <th scope='row'>{{ $loop->index + 1 }}</th>
                                            <td>{{ $categorie->nom }}</td>
                                            <td>$qdttotal</td>
                                            <td>$valeur</td>
                                            <td class='text-center'>
                                                {{-- <a href="{{ route('categorie.edit', ['categorie' => $categorie->id]) }}"
                                                    class="btn btn-primary"><i
                                                    class='bi bi-pencil-square'></i></a> --}}
                                                <a href="#" class="btn btn-danger"
                                                    onclick="if(confirm('Voulez vraiment supprimer cette categorie?')){document.getElementById('form-{{ $categorie->id }}').submit()}"><i
                                                        class='bi bi-trash-fill'></i></a>
                                                <form id="form-{{ $categorie->id }}"
                                                    action="{{ route('categorie.delete', ['categorie' => $categorie->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="delete">
                                                </form>
                                                {{-- <form method='post' action='{{ route('categorie.delete') }}'>
                                                    <button type='submit' name='modifier' class=' btn btn-primary'><i
                                                            class='bi bi-pencil-square'></i></button>
                                                    <button type='submit' class=' btn btn-danger' name='supprimer'><i
                                                            class='bi bi-trash-fill'></i></button>
                                                    <input type='hidden' value='$idc' name='id'>
                                                </form> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Default Table Example -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ajouter une categorie</h5>
                            @if (session()->has('successCreate'))

                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-1"></i>
                                {{ session()->get('successCreate') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>

                            @endif
                            @error('nom')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <p></p>
                            <form method="post" action="{{ route('create') }}">
                                @csrf
                                <input type="text" name="nom" id="" class="form-control"
                                    placeholder="Nom de la categorie" required><br>
                                <button type="submit" class="btn btn-primary form-control">Enregistrer</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Vue d'ensembe</h5>

                        <!-- Pie Chart -->
                        <div id="pieChart"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new ApexCharts(document.querySelector("#pieChart"), {
                                    series: [44, 55, 13, 43, 22],
                                    chart: {
                                        height: 350,
                                        type: 'pie',
                                        toolbar: {
                                            show: true
                                        }
                                    },
                                    labels: ['Cat 1', 'Cat 2', 'Cat 3', 'Cat 4', 'Cat 5']
                                }).render();
                            });
                        </script>
                        <!-- End Pie Chart -->
                    </div>
                </div>
            </div>

        </section>

    </main>
@endsection
