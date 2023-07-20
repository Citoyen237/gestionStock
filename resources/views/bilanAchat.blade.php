@extends('layout.app')
@section('title','Liste des vente')
@section('contenu')
    <section id="main" class="main">
        <div class="pagetitle">
            <h1>Bons de commande</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Bons</li>
                    <li class="breadcrumb-item active">factures</li>
                </ol>
            </nav>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Valeur total
                                <button>{{ $solde }}CFA</button>
                            </h5>
                            <table class="table datatable">
                                <thead>
                                    <th>Date</th>
                                    <th>N° Fac</th>
                                    <th>Fournisseur</th>
                                    <th>Prix (FCFA)</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($factures as $facture)
                                    <tr>
                                        <td>{{ $facture->created_at }}</td>
                                        <td>A0{{ $facture->code_fac }}</td>
                                        <td>{{ $facture->fournisseur->nom }}</td>
                                        <td>{{ $facture->total }}</td>
                                        <td>
                                            <a href="{{ route('pdf.factureA',['id'=>$facture->code_fac]) }}" class='btn btn-success'><i
                                                class='bi bi-download'></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Statistique des achats sur un ans</h5>

                            <!-- Line Chart -->
                            <div id="lineChart"></div>
                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new ApexCharts(document.querySelector("#lineChart"), {
                                        series: [{
                                            name: "Desktops",
                                            data: [70, 41, 15, 51, 49, 90, 69, 91, 18]
                                        }],
                                        chart: {
                                            height: 350,
                                            type: 'line',
                                            zoom: {
                                                enabled: false
                                            }
                                        },
                                        dataLabels: {
                                            enabled: false
                                        },
                                        stroke: {
                                            curve: 'straight'
                                        },
                                        grid: {
                                            row: {
                                                colors: ['#f3f3f3',
                                                'transparent'], // takes an array which will be repeated on columns
                                                opacity: 0.5
                                            },
                                        },
                                        xaxis: {
                                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                                        }
                                    }).render();
                                });
                            </script>
                            <!-- End Line Chart -->

                        </div>
                    </div>
                </div>
    </section>
@endsection
