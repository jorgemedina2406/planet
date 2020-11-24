<?php

namespace App\Http\Controllers\Admin\Import;

use App\User\Entities\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use App\Http\Controllers\ApiController;

/* ENTITIES */
use App\Import\Entities\Import;
use App\Product\Entities\Product;
use App\Import\Entities\ProductsImports;
use App\Country\Entities\Country;
use App\Import\Entities\PermissionsImports;
use App\Import\Entities\ProtocolsImports;
use App\Import\Entities\CardsImports;
use App\Import\Entities\PedimentsImports;
use App\Patent\Entities\Patent;
use App\Pediment\Entities\Pediment;
use App\Provider\Entities\Provider;
use App\Tax\Entities\Tax;
use App\Consignee\Entities\Consignee;
use App\Exporter\Entities\Exporter;
use App\Importer\Entities\Importer;
use App\Incoterm\Entities\Incoterm;
use App\Cr\Entities\Cr;
use App\Courier\Entities\Courier;
use App\Airline\Entities\Airline;
use App\Protocol\Entities\Protocol;
use App\Permission\Entities\Permission;
use App\Card\Entities\Card;
use App\Airport\Entities\Airport;
use App\Recognition\Entities\Recognition;

/* REPOSITORIES */
use App\Import\Repositories\ImportRepo;
use App\Notification\Repositories\NotificationRepo;

/* RESOURCE */
use App\Http\Resources\Import as ImportResource;

/* LIB */
use PDF;
use Image;
use App\Libs\Utils\NotificationEmail;


class ImportController extends ApiController
{
    private $importRepo;
    private $notificationRepo;

    public function __construct( Filesystem $file, ImportRepo $importRepo, NotificationRepo $notificationRepo )
    {
        $this->importRepo = $importRepo;
        $this->notificationRepo = $notificationRepo;
        $this->file       = $file;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['importers'] = Importer::all();
        return view('admin.imports.index', $data);

    }

    /**
     * View create import.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['products']       = Product::all();
        $data['permissions']    = Permission::all();
        $data['countries']      = Country::all();

        $data['patents']        = Patent::all();
        $data['pediments']      = Pediment::all();
        $data['consignatories'] = Consignee::all();
        $data['exporters']      = Exporter::all();
        $data['importers']      = Importer::all();
        $data['providers']      = Provider::all();

        $data['incoterms']      = Incoterm::all();
        $data['couriers']       = Courier::all();
        $data['crs']            = Cr::all();
        $data['lines']          = Airline::all();
        $data['airports']       = Airport::all();
        $data['protocols']      = Protocol::all();
        $data['cards']          = Card::all();
        $data['recognitions']   = Recognition::all();


        return view('admin.imports.create', $data);
    }

    /**
     * Get data Import.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataImport(Request $request)
    {

        $sort = $request->sort['sort'];

        $imports = $this->importRepo->getAll($sort);
        
        return ImportResource::collection($imports);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $tax = Tax::find(1);

        $dataImport = $request->all();
        $dataImport['reference'] = strtoupper($request->reference);
        $dataImport['observation'] = "nueva"; 
        $dataImport['user_id'] = \Auth::user()->id;


        $files = $request->file('evidence');
        $files_name = [];
        
        if( isset($files) ){
            foreach( $files as $file ) {
                array_push( $files_name, $file->getClientOriginalName());
            }

            $dataImport['evidence'] = implode(',', $files_name);
        }

        $import = $this->importRepo->createImport($dataImport);

        if(isset($files)){
            $path = public_path().'/files/imports/';
            $import_path = public_path().'/files/imports/'.$import->id.'/';
            $this->file->makeDirectory($import_path, 0777, true);

            foreach ($files as $file) {
                $original_name = $file->getClientOriginalName();
                $file->move($import_path, $original_name);
            }

        }

        foreach( $request->qty as $key => $item ) {

            $productsImports = new ProductsImports();

            $productsImports->import_id  = $import->id;
            $productsImports->product_id = $request->product[$key];
            $productsImports->qty        = $request->qty[$key];
            $productsImports->unid       = $request->unid[$key];
            $productsImports->price      = $request->price[$key];
            $productsImports->fraccion   = $request->fraccion[$key];

            $productsImports->save();
        }

        if( $request->has('permission') )
        {
            foreach( $request->permission as $key => $item ) {
    
                $permissionsImports = new PermissionsImports();
    
                $permissionsImports->import_id        = $import->id;
                $permissionsImports->permit_id        = $request->permission[$key];
                $permissionsImports->previous_balance = $request->previous_balance[$key];
                $permissionsImports->permit_discharge = $request->permit_discharge[$key];
                $permissionsImports->current_balance  = $request->current_balance[$key];
    
                $permissionsImports->save();
            }
        }

        if( $request->has('protocol_id') )
        {
            foreach( $request->protocol_id as $key => $item ) {

                $protocolsImports = new ProtocolsImports();

                $protocolsImports->protocol_id = $request->protocol_id[$key];
                $protocolsImports->import_id = $import->id;

                $protocolsImports->save();
            }
        }

        if( $request->has('card_id') )
        {
            foreach( $request->card_id as $key => $item ) {

                $cardsImports = new CardsImports();

                $cardsImports->card_id   = $request->card_id[$key];
                $cardsImports->import_id = $import->id;

                $cardsImports->save();
            }
        }

        if( $request->has('pediment_id') )
        {

            foreach( $request->pediment_id as $key => $item ) {


                $pedimentsImports = new PedimentsImports();

                $pedimentsImports->import_id    = $import->id;
                $pedimentsImports->pediment_id  = $request->pediment_id[$key];
                $pedimentsImports->nro_pediment = $request->nro_pediment[$key];
                $pedimentsImports->date_pay     = $request->date_pay[$key];

                $pedimentsImports->save();

            }
        }

        return redirect()->route('imports')->with('message_success', 'Importacion agregada exitosamente');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Import $import)
    {
        $data['import'] = $import;

        $data['productsImports']    = ProductsImports::where('import_id', $import->id)->get();
        $data['countries']          = Country::all();
        $data['products']           = Product::all();
        $data['permissions']        = Permission::all();

        $data['pedimentsImports']   = PedimentsImports::where('import_id', $import->id)->get();
        $data['permissionsImports'] = PermissionsImports::where('import_id', $import->id)->get();
        $data['protocolsImports']   = ProtocolsImports::where('import_id', $import->id)->get();
        $data['cardsImports']       = CardsImports::where('import_id', $import->id)->get();
        
        $data['patents']            = Patent::all();
        $data['pediments']          = Pediment::all();
        $data['consignatories']     = Consignee::all();
        $data['exporters']          = Exporter::all();
        $data['importers']          = Importer::all();
        $data['providers']          = Provider::all();

        $data['incoterms']          = Incoterm::all();
        $data['couriers']           = Courier::all();
        $data['crs']                = Cr::all();
        $data['lines']              = Airline::all();
        $data['airports']           = Airport::all();
        $data['recognitions']       = Recognition::all();
        $data['protocols']          = Protocol::all();
        $data['cards']              = Card::all();

        return view('admin.imports.edit', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view(Import $import)
    {
        $data['import'] = $import;

        $data['productsImports']    = ProductsImports::where('import_id', $import->id)->get();
        $data['countries']          = Country::all();
        $data['products']           = Product::all();
        $data['permissions']        = Permission::all();

        $data['pedimentsImports']   = PedimentsImports::where('import_id', $import->id)->get();
        $data['permissionsImports'] = PermissionsImports::where('import_id', $import->id)->get();
        $data['protocolsImports']   = ProtocolsImports::where('import_id', $import->id)->get();
        $data['cardsImports']       = CardsImports::where('import_id', $import->id)->get();
        
        $data['patents']            = Patent::all();
        $data['pediments']          = Pediment::all();
        $data['consignatories']     = Consignee::all();
        $data['exporters']          = Exporter::all();
        $data['importers']          = Importer::all();
        $data['providers']          = Provider::all();

        $data['incoterms']          = Incoterm::all();
        $data['couriers']           = Courier::all();
        $data['crs']                = Cr::all();
        $data['lines']              = Airline::all();
        $data['airports']           = Airport::all();
        $data['recognitions']       = Recognition::all();
        $data['protocols']          = Protocol::all();
        $data['cards']              = Card::all();

        return view('admin.imports.view', $data);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Import $import)
    {

        $import->update([
            'reference'                  => strtoupper($request->reference),
            'courier_id'                 => $request->courier_id,
            'date_notification'          => $request->date_notification,
            'mawb'                       => $request->mawb,
            'hawb'                       => $request->hawb,
            'line'                       => $request->line,
            'cr'                         => $request->cr,
            'incoterm'                   => $request->incoterm,
            'importer_id'                => $request->importer_id,
            'consignee_id'               => $request->consignee_id,
            'destination_country'        => $request->destination_country,
            'airport'                    => $request->airport,
            'nro_invoices'               => $request->nro_invoices,
            'date_invoices'              => $request->date_invoices,
            'patent_id'                  => $request->patent_id,
            'date_transfer'              => $request->date_transfer,
            'date_previous'              => $request->date_previous,
            'date_dispatch'              => $request->date_dispatch,
            'date_delivery'              => $request->date_delivery,
            'who_receives'               => $request->who_receives,
            'recognition_id'             => $request->recognition_id,
            'recognition_departure_time' => $request->recognition_departure_time,
            'user_update'                => \Auth::user()->id
        ]);

        $import->save();

        /* UPDATE EVIDENCE */

        if( isset($import->evidence) && $import->evidence != '' ) {
            $evidences = explode(',',$import->evidence);
        }else {
            $evidences = [];
        }

        $files = $request->file('evidence');

        if( isset($files) ){
            foreach( $files as $file ) {
                if( $file != null ) {
                    array_push( $evidences, $file->getClientOriginalName());
                }
            }
        }

        $import->update([
            'evidence' => implode(',', $evidences)
        ]);

        $import->save();

        if(isset($files)){

            $path = public_path().'/files/imports/';
            $import_path = public_path().'/files/imports/'.$import->id.'/';
            if(!file_exists($import_path)){
                $this->file->makeDirectory($import_path, 0777, true);
            }

            foreach ($files as $file) {
                $original_name = $file->getClientOriginalName();
                $file->move($import_path, $original_name);
            }

        }

        /* UPDATE PERMISSIONS */

        $permissions = PermissionsImports::where('import_id', $import->id)->get();

        foreach( $permissions as $permission ) {
            $permission->forceDelete();
            
        }

        if( $request->has('permission') ) {
            foreach( $request->permission as $key => $item ) {
                $permissionsImports = new PermissionsImports();
                $permissionsImports->import_id        = $import->id;
                $permissionsImports->permit_id        = $request->permission[$key];
                $permissionsImports->previous_balance = $request->previous_balance[$key];
                $permissionsImports->permit_discharge = $request->permit_discharge[$key];
                $permissionsImports->current_balance  = $request->current_balance[$key];
    
                $permissionsImports->save();
            }
        }

        /* UPDATE PRODUCTS */

        $products = ProductsImports::where('import_id', $import->id)->get();

        foreach( $products as $product ) {
            $product->forceDelete();
            
        }

        foreach( $request->product as $key => $item ) {
            $productsImports             = new ProductsImports();
            $productsImports->import_id  = $import->id;
            $productsImports->product_id = $request->product[$key];
            $productsImports->qty        = $request->qty[$key];
            $productsImports->unid       = $request->unid[$key];
            $productsImports->price      = $request->price[$key];
            $productsImports->fraccion   = $request->fraccion[$key];

            $productsImports->save();
        }

        /* UPDATE PEDIMENTS */

        $pediments = PedimentsImports::where('import_id', $import->id)->get();

        foreach( $pediments as $pediment ) {
            $pediment->forceDelete();
            
        }

        if( $request->has('pediment_id') ){
            foreach( $request->pediment_id as $key => $item ) {
    
                $pedimentsImports = new PedimentsImports();
    
                $pedimentsImports->import_id    = $import->id;
                $pedimentsImports->pediment_id  = $request->pediment_id[$key];
                $pedimentsImports->nro_pediment = $request->nro_pediment[$key];
                $pedimentsImports->date_pay     = $request->date_pay[$key];
    
                $pedimentsImports->save();
            }
        }


        /* UPDATE PROTOCOLS */

        $protocols = ProtocolsImports::where('import_id', $import->id)->get();

        foreach( $protocols as $protocol ) {
            $protocol->forceDelete();
        }

        if( $request->has('protocol_id') ) {
            foreach( $request->protocol_id as $key => $item ) {
                $protocolsImports = new ProtocolsImports();
                $protocolsImports->import_id = $import->id;
                $protocolsImports->protocol_id = $request->protocol_id[$key];
    
                $protocolsImports->save();
            }
        }

        /* UPDATE CARDS */

        $cards = CardsImports::where('import_id', $import->id)->get();

        foreach( $cards as $card ) {
            $card->forceDelete();
        }

        if( $request->has('card_id') ) {
            foreach( $request->card_id as $key => $item ) {
                $cardsImports = new CardsImports();
                $cardsImports->import_id = $import->id;
                $cardsImports->card_id = $request->card_id[$key];
    
                $cardsImports->save();
            }
        }

        return redirect()->route('imports')->with('message_success', 'Importacion actualizada');

    }

    /**
     * Update status the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request)
    {

        $import = Import::find($request->import);

        $import->update([
            'status_id' => $request->status_id,
            'observation' => $request->observation
        ]);

        $user = User::find($import->importer->user_id);

        $dataNotification['user_id'] = $import->importer->user_id;
        $dataNotification['notification'] = $request->observation;
        $dataNotification['status'] = $import->status->name;
        $dataNotification['reference'] = $import->reference;

        $notification = $this->notificationRepo->createNotification($dataNotification);

        NotificationEmail::notification($import->importer->email, $import);

        /* PUSH NOTIFICATION */

        $push_notification_key = env('PUSH_NOTIFICATION_KEY');    
        $url = "https://fcm.googleapis.com/fcm/send";            
        $header = array("authorization: key=" . $push_notification_key . "",
            "content-type: application/json"
        );    

        $postdata = '{
            "notification": {
                    "title":"Cambio de estatus",
                    "body": "'.$request->observation.'",
                    "sound":"default",
                    "click_action":"FCM_PLUGIN_ACTIVITY",
                    "icon":"fcm_push_icon"
            },
            "data":{
                "landing_page":"second",
                "status": "'.$import->status->name.'"
                "id": "'.$notification->id.'"
                "observation": "'.$notification->notification.'"
            },
            "to":"' . $user->tokenFcm . '",
            "priority":"high",
            "restricted_package_name":"",
        }';

        $ch = curl_init();
        $timeout = 120;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        // Get URL content
        $result = curl_exec($ch);    
        // close handle to release resources
        curl_close($ch);

        return $result;

        return response()->json('Estatus Actualizado');

        // return redirect()->route('exports')->with('message_success', 'Estatus actualizado');

    }

    /**
     * Export pdf.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function exportPdf(Import $import) 
    {

        $data['import'] = $import;

        $data['productsImports']    = ProductsImports::where('import_id', $import->id)->get();
        $data['countries']          = Country::all();
        $data['products']           = Product::all();
        $data['permissions']        = Permission::all();

        $data['pedimentsImports']   = PedimentsImports::where('import_id', $import->id)->get();
        $data['permissionsImports'] = PermissionsImports::where('import_id', $import->id)->get();
        $data['protocolsImports']   = ProtocolsImports::where('import_id', $import->id)->get();
        $data['cardsImports']       = CardsImports::where('import_id', $import->id)->get();
        
        $data['patents']            = Patent::all();
        $data['pediments']          = Pediment::all();
        $data['consignatories']     = Consignee::all();
        $data['exporters']          = Exporter::all();
        $data['airports']           = Airport::all();
        $data['protocols']          = Protocol::all();
        $data['cards']              = Card::all();
        $data['recognitions']       = Recognition::all();

        $pdf = PDF::loadView('admin.imports.pdf', $data);

        return $pdf->download('importref'.$import->reference.'.pdf');

    }

    /**
     * Delete the specified evidence.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteEvidence(Request $request, Import $import, $evidence)
    {
        $evidences = explode(',',$import->evidence);

        unset($evidences[$evidence]);

        $import->update([
            'evidence' => implode(',', $evidences)
        ]);

        $import->save();

        return redirect()->back()->with('message_success','La evidencia se elimino correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteProduct(Request $request, ProductsImports $product)
    {
        $product->forceDelete();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteProtocol(Request $request, ProtocolsImports $protocol)
    {
        $protocol->forceDelete();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCard(Request $request, CardsImports $card)
    {
        $card->forceDelete();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePermission(Request $request, PermissionsImports $permission)
    {
        $permission->forceDelete();
    }


    /**
     * Update recognition.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateRecognition(Request $request, Import $import)
    {
        $import->update([
            'recognition_id' => $request->recognition_new,
            'observation'    => $request->observation
        ]);

        $import->save();

        NotificationEmail::notification($import->importer->email, $import);

        return redirect()->route('imports')->with('message_success', 'Reconocimiento aduanero actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Import $import)
    {
        $import->delete();
    }
}
