<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>fiche_de_stock.pdf</title>
    {{-- <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}"> --}}
    <style>
          .client{
            width :50%;
        }
        .fac{
            margin-left: 50%;
            width :50%;
            margin-top: -20%;
        }
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
            background-color: rgb(75, 109, 248);
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
   <h1 class="title">Fiche de stock</h1>
   @foreach ($produits as $produit)
   <div class="client">
       <h3>Reference : <i>{{ $produit->nom }}</i> </h3>
       <h3>Designation : <i>{{ $produit->description }} </i></h3>
   </div>
   <div class="fac">
       <h3> Stock maximun:<i> {{ $produit->quandite }}</i></h3>
    <h3>Stock de securite <i>{{ $produit->quan_min }}</i> </h3>
   </div>
   @endforeach
   <table class="table datatable" border="1" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th colspan="3">jjj</th>
            <th colspan="3">ENTREES</th>
            <th colspan="3">SORTIES</th>
            <th colspan="3">STOCKS</th>
        </tr>
        <tr>
                <th>Date</th>
                <th>Libelle</th>
                <th>Num bon</th>
                <th>Qdt</th>
                <th>P.U</th>
                <th>Montant</th>
                <th>Qdt</th>
                <th>P.U</th>
                <th>Montant</th>
                <th>Qdt</th>
                <th>P.U</th>
                <th>Montant</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
   </table>

</body>
</html>
