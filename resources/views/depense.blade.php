@extends('layout.app')
@section('title', 'depenses')
@section('contenu')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Depenses</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Depenses</li>
                    <li class="breadcrumb-item active">Liste</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Liste de depenses
                                <button>
                                    5000FCFA
                                </button>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i
                                        class="bi bi-printer-fill"></i></button>
                            </h5>
                            <!-- Default Table -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Motif</th>
                                        <th scope="col">Montant (CFA)</th>
                                        <th scope="col">Realiser par</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($depenses as $depense)
                                        <tr>
                                            <th>{{ $depense->created_at }}</th>
                                            <td>{{ $depense->motif }}</td>
                                            <td>{{ $depense->montant }}</td>
                                            <td>{{ $depense->user->name }}</td>
                                            <td class='text-center'>
                                                <form method='post' action='depense.php'>
                                                    <button type='submit' class=' btn btn-danger' name='supprimer'><i
                                                            class='bi bi-trash-fill'></i></button>
                                                    <button type='submit' class='btn btn-success'><i
                                                            class='bi bi-printer-fill'></i></button>
                                                    <input type='hidden' value='$idp' name='id'>
                                                </form>
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
                            <h5 class="card-title">Nouvelle Depenses</h5>
                            @if ($errors->any())
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <form method="post" action="{{ route('depense.store') }}">
                                @csrf
                                <label for="montant" class="form-label">Montant:</label>
                                <input type="number" name="montant" id="montant" class="form-control"
                                    placeholder="Montant" required>
                                <label for="mtf" class="form-label">Motif:</label>
                                <textarea name="motif" id="mtf" cols="" rows="" class="form-control" required></textarea><br>
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
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
                        <h5 class="card-title">Statistique de depense par Mois</h5>

                        <!-- Bar Chart -->
                        <div id="lineChart"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new ApexCharts(document.querySelector("#lineChart"), {
                                    series: [{
                                        name: "Desktops",
                                        data: [10, 41, 35, 51, 149, 62, 20, 91, 148]
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
                                                'transparent'
                                            ], // takes an array which will be repeated on columns
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

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel">Specifations</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="Clients.php">
                                <div class="mb-2">
                                    <label for="recipient-name" class="col-form-label">Depenses d'un trimestre:</label>
                                    <select name="" id="" class="form-select">
                                        <option value=""></option>
                                        <option value="">Janvier/Fevrier/Mars</option>
                                        <option value="">Avril/Mai/Juin</option>
                                        <option value="">Juillet/Aour/Septembre</option>
                                        <option value="">Octobre/Novembre/Decembre</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <a href="listed.php" class="btn btn-warning form-control">Imprimer</a>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <a href="listed.php" class="btn btn-warning">Tous</a>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </main>
@endsection
