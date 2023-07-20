<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>fournisseur.pdf</title>
    <style>
        table tr td,
        table tr th {
            padding: 10px 15px;
        }

        .titre {
            color: blue;
            font-family: Rockwell Extra;
        }

        .head {
            text-align: center;
        }

        thead {
            background-color:  rgb(75, 109, 248);
            font-size: 17px;
        }

        .title {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    {{-- <img src="{{ asset('logo.png') }}" alt="" width="4%" height="10%"> --}}
    <div class="head">
        <h1 class="titre">ELISH-TECH</h1>
        <h3>Vente d'accessoires informatique et maintenance</h3>
        <h3>Adresse: Douala/Missoke</h3>
        <h3>Telephone: 691207395</h3>
    </div>
    <hr>
    <h1 class="title">Liste des fournisseurs</h1>
    <h3>Nombre total : {{ $fournisseurs->count() }}</h3>
    <table class="table datatable" border="1" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Nom entreprise</th>
                <th scope="col">Nom du directeur</th>
                <th scope="col">Telephone</th>
                <th scope="col">Email</th>
                <th scope="col">Adresse</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fournisseurs as $fournisseur)
                <tr>
                    <th>{{ $fournisseur->created_at->format('d-m-Y') }}</th>
                    <td>{{ $fournisseur->nom }}</td>
                    <td>{{ $fournisseur->prenom }}</td>
                    <td>{{ $fournisseur->telephone }}</td>
                    <td>{{ $fournisseur->email }}</td>
                    <td>{{ $fournisseur->adresse }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
