@extends('layout.app')
@section('title', 'maintenance')
@section('contenu')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Maintenance d'Appariels</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Maintenance</li>
                    <li class="breadcrumb-item active">Liste</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">

            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">

                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>
                    <div class="card">
                        <h5 class="card-title p-4">
                            Revenue
                            <button>
                                5000FCFA
                            </button>
                            <a href="{{ route('maintenance.create') }}" class="btn btn-primary">Nouveau</a>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i
                                    class="bi bi-printer-fill"></i></button>
                        </h5>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Appariels</h5>
                        <table class="table  datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Date</S></th>
                                    <th scope="col">Clients</th>
                                    <th scope="col">Appariels</th>
                                    <th scope="col">travailler</th>
                                    <th scope="col">N°serie</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($maintenances as $maintenance)
                                    <tr>
                                        <th>{{ $maintenance->created_at }}</th>
                                        <td>{{ $maintenance->client->nom.' '.$maintenance->client->prenom }}</td>
                                        <td>{{ $maintenance->nom }}</td>
                                        <td>{{ $maintenance->taff_effectuer }}</td>
                                        <td>{{ $maintenance->serie }}</td>
                                        <td>{{ $maintenance->montant }}</td>
                                        <td class='text-center'>
                                            <form action='maintenance.php' method='post'>
                                                <button type='submit' class='btn btn-success'><i
                                                        class='bi bi-printer-fill'></i></button>
                                                <button type='submit' class=' btn btn-danger' name='supprimer'><i
                                                        class='bi bi-trash-fill'></i></button>
                                                <input type='hidden' value='$id' name='id'>
                                        </td>
                                        </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div><!-- End Recent Sales -->

            </div>
            </div><!-- End News & Updates -->

            </div><!-- End Right side columns -->

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
                                    <label for="recipient-name" class="col-form-label">Travaux d'un trimestre:</label>
                                    <select name="" id="" class="form-select">
                                        <option value=""></option>
                                        <option value="">Janvier/Fevrier/Mars</option>
                                        <option value="">Avril/Mai/Juin</option>
                                        <option value="">Juillet/Aour/Septembre</option>
                                        <option value="">Octobre/Novembre/Decembre</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <a href="listem.php" class="btn btn-warning form-control">Imprimer</a>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <a href="listem.php" class="btn btn-warning">Tous</a>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </main>
@endsection
