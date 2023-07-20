<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>depense.pdf</title>
    <style>
        table tr td,
        table tr th{
            padding: 10px 15px;
        }

        .titre{
            color: blue;
            font-family: Rockwell Extra;
        }
        .head{
            text-align: center;
        }

       thead{
            background-color:  rgb(75, 109, 248);
            font-size: 17px;
        }
        .title{
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
     <h1 class="title">Liste des depenses</h1>
     <h3>Valeur total : {{ $solde }}FCFA</h3>
     <table class="table datatable" border="1" cellpadding="0" cellspacing="0">
        <thead>
            <tr align="left">
                <th>#</th>
                <th scope="col">Date</th>
                <th scope="col">Motif</th>
                <th scope="col">Montant (CFA)</th>
                <th scope="col">Realiser par</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($depenses as $depense)
                <tr align="left">
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $depense->created_at->format('d-m-Y') }}</td>
                    <td>{{ $depense->motif }}</td>
                    <td>{{ $depense->montant }}</td>
                    <td>{{ $depense->user->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
