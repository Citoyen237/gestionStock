<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>produit.pdf</title>
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
            background-color: rgb(75, 109, 248);
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
    <h1 class="title">Liste des produits en stock</h1>
    <h3>quandite total : {{ $produits->sum('quandite') }}</h3>
    <table class="table datatable" border="1" cellpadding="0" cellspacing="0">
            <thead>
                <th>#</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Quandite</th>
                <th>Quandite Critique</th>
                <th>Categorie</th>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>

</html>
