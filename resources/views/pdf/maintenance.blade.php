<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>maintenance.pdf</title>
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
     <h1 class="title">Liste des appareils maintenu</h1>
     <h3>Valeur total : {{ $solde }}FCFA</h3>
     <table class="table datatable" border="1" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</S></th>
                    <th scope="col">Clients</th>
                    <th scope="col">Appariels</th>
                    <th scope="col">travailler</th>
                    <th scope="col">N°serie</th>
                    <th scope="col">Prix</th>


                </tr>
            </thead>
            <tbody>
                @foreach ($maintenances as $maintenance)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $maintenance->created_at->format('d-m-Y') }}</td>
                        <td>{{ $maintenance->client->nom.' '.$maintenance->client->prenom }}</td>
                        <td>{{ $maintenance->nom }}</td>
                        <td>{{ $maintenance->taff_effectuer }}</td>
                        <td>{{ $maintenance->serie }}</td>
                        <td>{{ $maintenance->montant }}</td>
                        </form>
                    </tr>
                @endforeach
            </tbody>
    </table>
</body>
</html>
