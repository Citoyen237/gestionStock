 @extends('layout.app')
 @section('title','dashboard')
 @section('contenu')
 <main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-3">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Ventes <button>2</button></h5>
                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <a href="BilanVente.php"><i class="bi bi-cart"></i></a>
                                    </div>
                                    <div class="ps-1">
                                        <h6>58.000F</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-3">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Achats <button>10</button></h5>
                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <a href="BilanAchat.php"><i class="bi bi-currency-dollar"></i></a>
                                    </div>
                                    <div class="ps-1">
                                        <h6>85.000F</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-md-3">
                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">Maintenance <button>51</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <a href="maintenance.php"><i class="bi bi-gear-wide-connected"></i></a>
                                    </div>
                                    <div class="ps-3">
                                        <h6>500.000F</h6>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->
                    <div class="col-xxl-4 col-md-3">
                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">Depenses
                                    <button>4</button>
                                </h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-info">
                                        <a href="Depense.php"><i class="bi bi-clipboard-minus text-secondary"></i></a>
                                    </div>
                                    <div class="ps-3">
                                        <h6>450.100F</h6>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Line Chart -->
            <div class="container">
                <div class="card">
                    <div id="columnChart"></div>
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#columnChart"), {
                                series: [{
                                    name: 'Achat',
                                    data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
                                }, {
                                    name: 'Vente',
                                    data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
                                }, {
                                    name: 'Maintenance',
                                    data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
                                }, {
                                    name: 'Depense',
                                    data: [25, 41, 47, 26, 88, 48, 14, 73, 41]
                                }],
                                chart: {
                                    type: 'bar',
                                    height: 350
                                },
                                plotOptions: {
                                    bar: {
                                        horizontal: false,
                                        columnWidth: '55%',
                                        endingShape: 'rounded'
                                    },
                                },
                                dataLabels: {
                                    enabled: false
                                },
                                stroke: {
                                    show: true,
                                    width: 2,
                                    colors: ['transparent']
                                },
                                xaxis: {
                                    categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                                },
                                yaxis: {
                                    title: {
                                        text: '$ (thousands)'
                                    }
                                },
                                fill: {
                                    opacity: 1
                                },
                                tooltip: {
                                    y: {
                                        formatter: function(val) {
                                            return "$ " + val + " thousands"
                                        }
                                    }
                                }
                            }).render();
                        });
                    </script>
                </div>
            </div>

            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">

                    <div class="card-body">
                        <h5 class="card-title">Facturations recentes</h5>

                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th scope="col">N° fac</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Cient/Motif/Fourniseur</th>
                                    <th scope="col">Montant (FCFA)</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope='row'><a href='#'>V0014
                                    </th>
                                    <td>23-17-2023</td>
                                    <td><a href='#' class='text-primary'>Nana romeo</a></td>
                                    <td>50.0000</td>
                                    <td><span class='badge bg-info'>vente</span></td>
                                </tr>
                                <input type='hidden' value='$id' name='id'> </form>
                                </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>

        </div>
        </div><!-- End Recent Sales -->

        </div>
        </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->

        </div>
        <div class="container">
            <div class="row">

                <div class="card col-md-12 border">

                    <div class="col-12">
                        <div class="card-body">
                            <h3 class="card-title">Produits les plus vendus</h3>
                        </div>
                        <div id="barChart"></div>

                        <script>

                            document.addEventListener("DOMContentLoaded", () => {
                                new ApexCharts(document.querySelector("#barChart"), {
                                    series: [{
                                        data: [102, 430, 448, 470, 540, 580, 690, 1100, 120, 1380]
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

                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    </section>
</main><!-- End #main -->
 @endsection
