<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consolidados</title>

    <style>
        .container{
            margin: 25px;
        }

        .text-left{
            text-align: left;
        }

        .table{
            width: 100%;
        }

        th{
            padding-top: 20px;
        }

        .left{
            float: left;
        }

        .right{
            float: right;
        }

        .py25{
            padding-top: 25px;
            padding-bottom: 25px;
        }

        h4{
            color: #0069ff;
        }

        th{
            color: #105902;
        }


    </style>
</head>
<body>
    
    <section style="text-align: center">
        <img src="{{ asset('assets/media/logos/logoapp.png') }}" alt="" style="width: 200px">
    </section>

    {{-- <div class="text-left"> --}}
        <section>
            <h4>Datos de la Consolidacion</h4>
            <hr style="margin-top: 10px; margin-bottom: 10px">
            <table class="table">
                <thead style="width: 100%">
                    <tr>
                        <th style="width: 100%">Referencia</th>
                        <th style="width: 100%">Courier</th>
                        <th style="width: 100%">Guia master</th>
                        <th style="width: 100%">Hawbs</th>
                    </tr>
                </thead>
                
                <tbody>
                    <tr>
                        <td scope="row">{{ $consolidated->des }}</td>
                        <td>{{ $consolidated->courier->name }}</td>
                        <td>{{ $consolidated->guie }}</td>
                        <td>{{ $consolidated->hawbs }}</td>
                    </tr>
                    <thead style="width: 100%">
                        <tr>
                            <th style="width: 100%">Hawbs entregada</th>
                            <th style="width: 100%">Hawns Planet</th>
                            <th style="width: 100%">Fecha de notificacion</th>
                        </tr>
                    </thead>
                    <tr>
                        <td scope="row">{{ $consolidated->hawbs_delivered }}</td>
                        <td>{{ $consolidated->hawns_planet }}</td>
                        <td>{{ $consolidated->date_notification }}</td>
                    </tr>
                </tbody>
            </table>
        </section>
    {{-- </div> --}}
</body>
</html>