<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Importacion</title>

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
            <h4>Datos de la Importacion</h4>
            <hr style="margin-top: 10px; margin-bottom: 10px">
            <table class="table">
                <thead style="width: 100%">
                    <tr>
                        <th style="width: 100%">Referencia</th>
                        <th style="width: 100%">Courier</th>
                        <th style="width: 100%">Fecha de notificacion</th>
                        <th style="width: 100%">MAWB</th>
                    </tr>
                </thead>
                
                <tbody>
                    <tr>
                        <td scope="row">{{ $import->reference }}</td>
                        <td>{{ $import->courier->name }}</td>
                        <td>{{ $import->date_notification }}</td>
                        <td>{{ $import->mawb }}</td>
                    </tr>
                    <thead style="width: 100%">
                        <tr>
                            <th style="width: 100%">HAWB</th>
                            <th style="width: 100%">Linea Aerea</th>
                            <th style="width: 100%">CR</th>
                            <th style="width: 100%">Incoterm</th>
                        </tr>
                    </thead>
                    <tr>
                        <td scope="row">{{ $import->mawb }}</td>
                        <td>{{ $import->airline->name }}</td>
                        <td>{{ $import->cr->code }}</td>
                        <td>{{ $import->incoterm->name }}</td>
                    </tr>
                    <thead style="width: 100%">
                        <tr>
                            <th style="width: 100%">Importador</th>
                            <th style="width: 100%">Consignatorio</th>
                            <th style="width: 100%">Pais destino</th>
                            <th style="width: 100%">Aeropuerto codigo IATA</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>{{ $import->importer->name }}</td>
                        <td>{{ $import->consignee->name }}</td>
                        <td>{{ $import->country->name }}</td>
                        <td>{{ $import->airport }}</td>
                    </tr>
                    <thead style="width: 100%">
                        <tr>
                            <th style="width: 100%">Nro de facturas</th>
                            <th style="width: 100%">Fecha de factura</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>{{ $import->nro_invoices }}</td>
                        <td>{{ $import->date_invoices }}</td>
                    </tr>
                </tbody>
            </table>
        </section>
        

        <hr style="margin-top: 10px; margin-bottom: 10px">

        <section>    
            <div class="main">
                <div class="left">
                    <h4>Datos de la patente</h4>
                    <table style="border-right: solid 1px; padding-right: 50px; width: 50%;">
                        <thead>
                            <tr>
                                <th>Patente</th>
                                <th>Agente aduanal</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
                                <td scope="row">{{ (isset($import->patent)) ? $import->patent->patent : '' }}</td>
                                <td>{{ (isset($import->patent)) ? $import->patent->agent_aduanal : '' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="right">
                    <h4>Datos de los pedimentos</h4>
                    <table style="width: 50%; padding-left: 50px;">
                        <thead>
                            <tr>
                                <th>Pedimento</th>
                                <th>Numero</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach( $pedimentsImports as $item )
                            <tr>
                                <td scope="row">
                                    @foreach( $pediments as $pediment )
                                        {{ ($pediment->id == $item->pediment_id) ? $pediment->pediment : '' }}
                                    @endforeach
                                </td>
                                <td>{{ $item->nro_pediment }}</td>
                                <td>{{ $item->date_pay }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div style="clear: both;"></div>

                {{-- </div> --}}
            </div>
        </section>

        <section>
            <hr style="margin-top: 10px; margin-bottom: 10px">
            <table class="table">
                <thead>
                    <tr>
                        <th>Fecha de transferencia</th>
                        <th>Fecha de previo</th>
                        <th>Fecha de despacho</th>
                        <th>Fecha de entrega</th>
                    </tr>
                </thead>
                
                <tbody>
                    <tr>
                        <td scope="row">{{ $import->date_transfer }}</td>
                        <td>{{ $import->date_previous }}</td>
                        <td>{{ $import->date_dispatch }}</td>
                        <td>{{ $import->date_delivery }}</td>
                    </tr>
                    <thead>
                        <tr>
                            <th>Quien recibe</th>
                            <th>Reconocimiento aduanero</th>
                            <th>Hora de salida de reconocimiento</th>
                        </tr>
                    </thead>
                        <tr>
                            <td scope="row">{{ $import->who_receives }}</td>
                            <td>{{ ($import->recognition) ? $import->recognition->name : '' }}</td>
                            <td>{{ $import->recognition_departure_time }}</td>
                        </tr>
                </tbody>
            </table>
            <hr style="margin-top: 10px; margin-bottom: 5px">
        </section>

        <section>    
            <div class="main">
                <div class="left">
                    <h4>Datos de los protocolos</h4>
                    <table style="border-right: solid 1px; padding-right: 10px; width: 50%;">
                        <thead>
                            <tr>
                                @for ($i = 1; $i <= $protocolsImports->count(); $i++)
                                    <th>Protocolo {{ $i }}</th>
                                @endfor
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
                                @foreach( $protocolsImports as $item )
                                    <td scope="row">
                                        @foreach( $protocols as $protocol )
                                        {{ ($protocol->id == $item->protocol_id) ? $protocol->name : '' }}
                                        @endforeach
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="right">
                    <h4>Datos de las cartas</h4>
                    <table style="width: 50%; padding-left: 10px;">
                        <thead>
                            <tr>
                                @for ($i = 1; $i <= $cardsImports->count(); $i++)
                                    <th>Carta {{ $i }}</th>
                                @endfor
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
                                @foreach( $cardsImports as $item )
                                    <td scope="row">
                                        @foreach( $cards as $card )
                                        {{ ($card->id == $item->card_id) ? $card->name : '' }}
                                        @endforeach
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="clear: both;"></div>

                {{-- </div> --}}
            </div>
        </section>

        <hr style="margin-top: 10px; margin-bottom: 10px">

        <section>    
            <div class="main">
                <div class="left">
                    <h4>Datos de los productos</h4>
                    <table style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Unidad de factura</th>
                                <th>Valor producto</th>
                                <th>Fraccion arancelaria</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach( $productsImports as $item )
                            <tr>
                                <td scope="row">
                                    @foreach( $products as $product )
                                    {{ ($product->id == $item->product_id) ? $product->name : '' }}
                                    @endforeach
                                </td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->unid }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->fraccion }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div style="clear: both;"></div>

                {{-- </div> --}}
            </div>
        </section>

        <hr style="margin-top: 10px; margin-bottom: 10px">

        <section>    
            <div class="main">
                <div class="left">
                    <h4>Datos de los permisos</h4>
                    <table style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Permiso</th>
                                <th>Saldo anterior</th>
                                <th>Descargo de permiso</th>
                                <th>Saldo actual</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach( $permissionsImports as $item )                            
                            <tr>
                                <td scope="row">{{ $item->permit }}</td>
                                <td>{{ $item->previous_balance }}</td>
                                <td>{{ $item->permit_discharge }}</td>
                                <td>{{ $item->current_balance }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div style="clear: both;"></div>

                {{-- </div> --}}
            </div>
        </section>


    {{-- </div> --}}
    
</body>
</html>