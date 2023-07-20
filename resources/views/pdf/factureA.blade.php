<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>bon.pdf</title>
    <style>
        .client{
            width :65%;
        }
        .fac{
            margin-left: 70%;
            width :30%;
            margin-top: -20%;
        }
        table tr td,
        table tr th {
            padding: 10px 15px;
        }

        .titre {
            color: rgb(70, 70, 236);
            font-family: Rockwell Extra;
        }

        .head {
            text-align: center;
        }

        .td,
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
    )
    <table class="table datatable" border="1" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Designation</th>
                <th scope="col">Qdt</th>
                <th scope="col">Prix_U</th>
                <th scope="col">Prix_T</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($achats as $achat)
                <tr>
                    <th scope='row'>{{ $loop->index + 1 }}</th>
                    <td>{{ $achat->produit->nom . '/' . $achat->produit->description }}</td>
                    <td>{{ $achat->quandite }}</td>
                    <td>{{ $achat->prixu }}</td>
                    <td>{{ $achat->total }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" class="td" align="center">NET A PAYER (FCFA)</td>
                <td>{{ $achats->sum('total') }}</td>
            </tr>
        </tbody>
    </table>
    <p>Les marchandises ci-dessus sont achete en bon etat: elles ne sont ni etre reprises ni echangees 30
        jours de garantie et pas de remboursement.</p>
    <h3 style="text-align:left">Signature du fournisseur</h3>
</body>

</html>
