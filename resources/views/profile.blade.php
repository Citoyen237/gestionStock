@extends('layout.app')
@section('title')
    Profile
@endsection
@section('contenu')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Utilisateurs</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <img src="{{ asset('admin/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
                            <h2>Nana romeo</h2>
                            <h3>Stagaire</h3>
                            <div class="social-links mt-2">
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Informations</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Modifier le
                                        profile</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Changer le mots de passe</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">
                                <br>
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">A propos</h5>
                                    <p class="small fst-italic">aucune obervation pour ce utilisateur.</p>

                                    <h5 class="card-title">Details </h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Nom:</div>
                                        <div class="col-lg-9 col-md-8">{{ Auth::user()->name }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Adresse e-Mail:</div>
                                        <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Telephone:</div>
                                        <div class="col-lg-9 col-md-8"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Poste:</div>
                                        <div class="col-lg-9 col-md-8">{{ Auth::user()->poste->nom }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Date de creation:</div>
                                        <div class="col-lg-9 col-md-8">{{ Auth::user()->created_at }}</div>
                                    </div>

                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <form method="post" action="profile.php">
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Image de
                                                profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <img src="{{ asset('admin/img/profile-img.jpg') }}" alt="Profile">
                                                <div class="pt-2">
                                                    <a href="#" class="btn btn-primary btn-sm"
                                                        title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                                    <a href="#" class="btn btn-danger btn-sm"
                                                        title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nom &
                                                Prenom:</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="nom" type="text" class="form-control" id="fullName"
                                                    value="{{ Auth::user()->name }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="company"
                                                class="col-md-4 col-lg-3 col-form-label">Telephone:</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="telephone" type="text" class="form-control" id="company"
                                                    value="">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Adresse
                                                E-mail:</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="text" class="form-control" id="Job"
                                                    value="{{ Auth::user()->email }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Poste:</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="poste" type="text" class="form-control" id="Job"
                                                    value="{{ Auth::user()->poste->nom }}">
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary" name="save">Enregistrer les
                                                modification</button>
                                        </div>
                                    </form><!-- End Profile Edit Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-settings">

                                    <!-- Settings Form -->
                                    <form>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary" name="">Enregistrer les
                                                modifications</button>
                                        </div>
                                    </form><!-- End settings Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form action="profile.php" method="post">

                                        <div class="row mb-3">
                                            <label for="currentPassword" class="col-md-4 col-lg-5 col-form-label">Ancien
                                                mots de passe:</label>
                                            <div class="col-md-8 col-lg-7">
                                                <input name="password" type="password" class="form-control"
                                                    id="currentPassword" name="ancien">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-5 col-form-label">Nouveau mots
                                                passe:</label>
                                            <div class="col-md-8 col-lg-7">
                                                <input name="newpassword" type="password" class="form-control"
                                                    id="newPassword" name="nouveau">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="renewPassword" class="col-md-4 col-lg-5 col-form-label">Confirmer
                                                le mots de passe:</label>
                                            <div class="col-md-8 col-lg-7">
                                                <input name="renewpassword" type="password" class="form-control"
                                                    id="renewPassword" name="cnouveau">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary"
                                                name="changePasse">Changer</button>
                                        </div>
                                    </form><!-- End Change Password Form -->

                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
    @endsection
