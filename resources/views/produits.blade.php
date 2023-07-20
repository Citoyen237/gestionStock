@extends('layout.app')
@section('title', 'liste de produit')
@section('contenu')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Stocks</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Stocks</li>
                    <li class="breadcrumb-item active">Liste</li>
                </ol>
            </nav>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Produits en stocks
                                <a href="{{ route('produit.create') }}" class="btn btn-primary">Ajouter</a>
                                <a href="{{ route('pdf.produit') }}" class="btn btn-warning"><i class="bi bi-printer-fill"></i></a>
                            </h5>
                            <h5>
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
                            </h5>
                            <table class="table datatable">
                                <thead>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Description</th>
                                    <th>Prix</th>
                                    <th>Quandite</th>
                                    <th>Quandite Critique</th>
                                    <th>Categorie</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($produits as $produit)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $produit->nom }}</td>
                                            <td>{{ $produit->description }}</td>
                                            <td>{{ $produit->prix }}</td>
                                            <td>{{ $produit->quandite }}</td>
                                            <td>{{ $produit->quan_min }}</td>
                                            <td>{{ $produit->categorie->nom }}</td>

                                            <td>
                                                <a href="{{ route('suivis',['id'=>$produit->id]) }}" class="btn btn-outline-warning">Suivis</a>
                                                <a href="{{ route('produit.edit', ['produit' => $produit->id]) }}"
                                                    class="btn btn-primary"><i class='bi bi-pencil-square'></i></a>
                                                <a href="#" class="btn btn-danger"
                                                    onclick="if(confirm('Voulez vraiment supprimer ce produit?')){document.getElementById('form-{{ $produit->id }}').submit()}"><i
                                                        class='bi bi-trash-fill'></i></a>
                                                <form id="form-{{ $produit->id }}"
                                                    action="{{ route('produit.delete', ['produit' => $produit->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="delete">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $produits->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Statistique de produit par categorie</h5>

                            <!-- Bar Chart -->
                            <!-- Bar Chart -->
                            <div id="barChart"></div>

                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new ApexCharts(document.querySelector("#barChart"), {
                                        series: [{
                                            data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
                                        }],
                                        chart: {
                                            type: 'bar',
                                            height: 350
                                        },
                                        plotOptions: {
                                            bar: {
                                                borderRadius: 4,
                                                horizontal: true,
                                            }
                                        },
                                        dataLabels: {
                                            enabled: false
                                        },
                                        xaxis: {
                                            categories: ['porduit1', 'porduit2', 'porduit3', 'porduit4', 'porduit5', 'porduit6',
                                                'porduit7',
                                                'porduit10', 'porduit9', 'porduit8'
                                            ],
                                        }
                                    }).render();
                                });
                            </script>
                            <!-- End Bar Chart -->
                        </div>

                    </div>
                </div>
            </div>
    </main>

@endsection
