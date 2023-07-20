@extends('layout.app')
@section('title','utilisateurs')
@section('contenu')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Gestion des utilisateurs</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
          <li class="breadcrumb-item">Utilisateurs</li>
          <li class="breadcrumb-item active">Liste</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Utilisateurs
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="bi bi-person-plus-fill"></i></button>
                <a href="listeu.php" class="btn btn-warning"><i class="bi bi-printer-fill"></i></a>
              </h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Poste</th>
                    <th scope="col">Date</th>
                    <th scope="col" class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($utilisateurs as $user)
                        <tr>
                        <th scope='row'>{{ $loop->index+1 }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>655927237</td>
                        <td>{{ $user->poste->nom }}</td>
                        <td>{{ $user->created_at->format('d-m-Y') }}</td>
                        <td class='text-center'><button type='submit' name='modifier' class=' btn btn-primary'><i class='bi bi-pencil-square'></i></button>
                        <button type='submit'  class=' btn btn-danger' name='supprimer'><i class='bi bi-trash-fill'></i></button>
                        <input type='hidden' value='$id' name='id'> </form></td>
                      </tr>
                      @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-center" id="exampleModalLabel">Ajouter un utilisateur</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" method="post" action="createUser.php" autocomplete="off">
                    <div class="col-md-12">
                      <label for="inputName5" class="form-label">Nom:</label>
                      <input type="text" class="form-control" id="inputName5" name="nom" required>
                    </div>
                    <div class="col-md-6">
                      <label for="inputEmail5" class="form-label">Email:</label>
                      <input type="mail" class="form-control" id="inputEmail5" name="mail"  required>
                    </div>
                    <div class="col-md-6">
                      <label for="inputPassword5" class="form-label">Mot de passe:</label>
                      <input type="password" class="form-control" id="inputPassword5" name="password"  required>
                    </div>
                    <div class="col-12">
                      <label for="inputAddress5" class="form-label">Confirmer le mot de passe:</label>
                      <input type="password" class="form-control" id="inputAddres5s" placeholder="" name="cpassword"  required>
                    </div>
                    <div class="col-12">
                      <label for="inputAddress2" class="form-label">Telephone:</label>
                      <input type="text" class="form-control" id="inputAddress2" placeholder="+237 xxx xxx xxx" name="telephone"  required>
                    </div>
<!-- End Multi Columns Form -->
            <div class="modal-footer">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="valider">Ajouter</button>
                    <a href="" class="btn btn-secondary">Annuler</a>
                  </div>
                </form>
            </div>
          </div>
        </div>
        </div>
    </main>
@endsection
