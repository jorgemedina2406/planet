<?php

namespace App\Http\Controllers\Admin\Export;

use App\User\Entities\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use App\Http\Controllers\ApiController;

/* ENTITIES */
use App\Export\Entities\Export;
use App\Product\Entities\Product;
use App\Export\Entities\ProductsExports;
use App\Export\Entities\PermissionsExports;
use App\Export\Entities\ProtocolsExports;
use App\Export\Entities\CardsExports;
use App\Export\Entities\PedimentsExports;
use App\Country\Entities\Country;
use App\Patent\Entities\Patent;
use App\Pediment\Entities\Pediment;
use App\Tax\Entities\Tax;
use App\Consignee\Entities\Consignee;
use App\Exporter\Entities\Exporter;
use App\Incoterm\Entities\Incoterm;
use App\Cr\Entities\Cr;
use App\Courier\Entities\Courier;
use App\Airline\Entities\Airline;
use App\Protocol\Entities\Protocol;
use App\Card\Entities\Card;
use App\Airport\Entities\Airport;
use App\Recognition\Entities\Recognition;
use App\Permission\Entities\Permission;

/* REPOSITORIES */
use App\Export\Repositories\ExportRepo;
use App\Notification\Repositories\NotificationRepo;

/* RESOURCE */
use App\Http\Resources\Export as ExportResource;
use App\Http\Resources\ExportCollection as ExportCollectionResource;

/* LIB */
use PDF;
use Image;
use App\Libs\Utils\NotificationEmail;

class ExportController extends ApiController
{
    private $exportRepo;
    private $notificationRepo;

    private $file;

    public function __construct( 
        Filesystem $file, 
        ExportRepo $exportRepo, 
        NotificationRepo $notificationRepo 
        )
    {
        $this->exportRepo = $exportRepo;
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
        $data['exporters'] = Exporter::all();
        return view('admin.exports.index', $data);
    }

    /**
     * View create export.
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
        $data['incoterms']      = Incoterm::all();
        $data['couriers']       = Courier::all();
        $data['crs']            = Cr::all();
        $data['lines']          = Airline::all();
        $data['airports']       = Airport::all();
        $data['protocols']      = Protocol::all();
        $data['cards']          = Card::all();
        $data['recognitions']   = Recognition::all();
        $data['tax']            = Tax::find(1);

        return view('admin.exports.create', $data);
    }

    /**
     * Get data Export.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataExport(Request $request)
    {

        $sort = $request->sort['sort'];
        $exports = $this->exportRepo->getAll($sort);

        // Define the page and number of items per page
        $page = 1;
        $per_page = 10;

        // Define the default order
        $order_field = 'reference';
        $order_sort = 'asc';

        // Get the request parameters
        $params = $request->all();
        $query = Export::query();

        // Set the current page
        if(isset($params['pagination']['page'])) {
            $page = $params['pagination']['page'];
        }

        // Set the number of items
        if(isset($params['pagination']['perpage'])) {
            $per_page = $params['pagination']['perpage'];
        }

        // Set the search filter
        if(isset($params['query']['generalSearch'])) {
            $query->where('reference', 'LIKE', "%" . $params['query']['generalSearch'] . "%");
        }

        // Set the status filter
        if(isset($params['query']['Status'])) {
            $query->where('status', $params['query']['Status']);
        }

        // Set the sort order and field
        if(isset($params['sort']['field'])) {
            $order_field = $params['sort']['field'];
            $order_sort = $params['sort']['sort'];
        }

        // Get how many items there should be
        $total = $query->limit($per_page)->count();

        // Set the meta info
        $request->meta = [
            "page" => $page,
            "pages" => ceil($total / $per_page),
            "perpage" => $per_page,
            "total" => $total,
            "sort" => $order_sort,
            "field" => $order_field
        ];

        // Get the items defined by the parameters
        $results = $query->skip(($page - 1) * $per_page)
        ->take($per_page)->orderBy($order_field, $order_sort)
        ->get();

        

        \Log::debug('assda0',[new ExportCollectionResource($results)]);
        return new ExportCollectionResource($results);
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

        $dataExport = $request->all();
        $dataExport['reference'] = strtoupper($request->reference);
        $dataExport['observation'] = ''; 
        $dataExport['ige'] = $tax->ige;
        $dataExport['dta'] = $tax->dta;
        $dataExport['prv'] = $tax->prv;
        $dataExport['cnt'] = $tax->cnt;
        $dataExport['user_id'] = \Auth::user()->id;
        
        $files = $request->file('evidence');
        $files_name = [];
        
        if( isset($files) ){
            foreach( $files as $file ) {
                array_push( $files_name, $file->getClientOriginalName());
            }

            $dataExport['evidence'] = implode(',', $files_name);
        }

        $export = $this->exportRepo->createExport($dataExport);

        if(isset($files)){
            $path = public_path().'/files/exports/';
            $export_path = public_path().'/files/exports/'.$export->id.'/';
            $this->file->makeDirectory($export_path, 0777, true);

            foreach ($files as $file) {
                $original_name = $file->getClientOriginalName();
                $file->move($export_path, $original_name);
            }

        }

        foreach( $request->qty as $key => $item ) {

            $productsExports = new ProductsExports();

            $productsExports->export_id  = $export->id;
            $productsExports->product_id = $request->product[$key];
            $productsExports->qty        = $request->qty[$key];
            $productsExports->unid       = $request->unid[$key];
            $productsExports->price      = $request->price[$key];
            $productsExports->fraccion   = $request->fraccion[$key];

            $productsExports->save();
        }

        if( $request->has('permission') )
        {
            foreach( $request->permission as $key => $item ) {
    
                $permissionsExports = new PermissionsExports();
    
                $permissionsExports->export_id        = $export->id;
                $permissionsExports->permit           = $request->permission[$key];
                $permissionsExports->previous_balance = $request->previous_balance[$key];
                $permissionsExports->permit_discharge = $request->permit_discharge[$key];
                $permissionsExports->current_balance  = $request->current_balance[$key];
    
                $permissionsExports->save();
            }
        }

        if( $request->has('protocol_id') )
        {
            foreach( $request->protocol_id as $key => $item ) {

                $protocolsExports = new ProtocolsExports();

                $protocolsExports->protocol_id = $request->protocol_id[$key];
                $protocolsExports->export_id = $export->id;

                $protocolsExports->save();
            }
        }

        if( $request->has('card_id') )
        {
            foreach( $request->card_id as $key => $item ) {

                $cardsExports = new CardsExports();

                $cardsExports->card_id = $request->card_id[$key];
                $cardsExports->export_id = $export->id;

                $cardsExports->save();
            }
        }

        if( $request->has('pediment_id') )
        {

            foreach( $request->pediment_id as $key => $item ) {


                $pedimentsExports = new PedimentsExports();

                $pedimentsExports->export_id    = $export->id;
                $pedimentsExports->pediment_id  = $request->pediment_id[$key];
                $pedimentsExports->nro_pediment = $request->nro_pediment[$key];
                $pedimentsExports->date_pay     = $request->date_pay[$key];

                $pedimentsExports->save();

            }
        }
        
        return redirect()->route('exports')->with('message_success', 'Exportacion agregada exitosamente');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Export $export)
    {
        $data['export'] = $export;

        $data['productsExports']    = ProductsExports::where('export_id', $export->id)->get();
        $data['pedimentsExports']   = PedimentsExports::where('export_id', $export->id)->get();
        $data['permissionsExports'] = PermissionsExports::where('export_id', $export->id)->get();
        $data['protocolsExports']   = ProtocolsExports::where('export_id', $export->id)->get();
        $data['cardsExports']       = CardsExports::where('export_id', $export->id)->get();
        $data['permissions']        = Permission::all();

        $data['tax']                = Tax::find(1);

        $data['countries']          = Country::all();
        $data['products']           = Product::all();

        $data['patents']            = Patent::all();
        $data['pediments']          = Pediment::all();
        $data['consignatories']     = Consignee::all();
        $data['exporters']          = Exporter::all();
        $data['incoterms']          = Incoterm::all();
        $data['couriers']           = Courier::all();
        $data['crs']                = Cr::all();
        $data['lines']              = Airline::all();
        $data['airports']           = Airport::all();
        $data['recognitions']       = Recognition::all();
        $data['protocols']          = Protocol::all();
        $data['cards']              = Card::all();

        return view('admin.exports.edit', $data);    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view(Export $export)
    {
        $data['export'] = $export;

        $data['productsExports']    = ProductsExports::where('export_id', $export->id)->get();
        $data['pedimentsExports']   = PedimentsExports::where('export_id', $export->id)->get();
        $data['permissionsExports'] = PermissionsExports::where('export_id', $export->id)->get();
        $data['protocolsExports']   = ProtocolsExports::where('export_id', $export->id)->get();
        $data['cardsExports']       = CardsExports::where('export_id', $export->id)->get();
        $data['permissions']        = Permission::all();
        $data['tax']                = Tax::find(1);
        
        $data['countries']          = Country::all();
        $data['products']           = Product::all();

        $data['patents']            = Patent::all();
        $data['pediments']          = Pediment::all();
        $data['consignatories']     = Consignee::all();
        $data['exporters']          = Exporter::all();
        $data['incoterms']          = Incoterm::all();
        $data['couriers']           = Courier::all();
        $data['crs']                = Cr::all();
        $data['lines']              = Airline::all();
        $data['airports']           = Airport::all();
        $data['recognitions']       = Recognition::all();
        $data['protocols']          = Protocol::all();
        $data['cards']              = Card::all();


        return view('admin.exports.view', $data);    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function exportPdf(Export $export)
    {
        $data['export'] = $export;

        $data['productsExports']    = ProductsExports::where('export_id', $export->id)->get();
        $data['pedimentsExports']   = PedimentsExports::where('export_id', $export->id)->get();
        $data['permissionsExports'] = PermissionsExports::where('export_id', $export->id)->get();
        $data['protocolsExports']   = ProtocolsExports::where('export_id', $export->id)->get();
        $data['cardsExports']       = CardsExports::where('export_id', $export->id)->get();
        
        $data['countries']          = Country::all();
        $data['products']           = Product::all();

        $data['patents']            = Patent::all();
        $data['pediments']          = Pediment::all();
        $data['consignatories']     = Consignee::all();
        $data['airports']           = Airport::all();
        $data['exporters']          = Exporter::all();
        $data['recognitions']       = Recognition::all();
        $data['protocols']          = Protocol::all();
        $data['cards']              = Card::all();

        $pdf = PDF::loadView('admin.exports.pdf', $data);

        return $pdf->download('exportref'.$export->reference.'.pdf');    
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Export $export)
    {
        $export->update([
            'reference'                  => strtoupper($request->reference),
            'courier_id'                 => $request->courier_id,
            'date_notification'          => $request->date_notification,
            'mawb'                       => $request->mawb,
            'hawb'                       => $request->hawb,
            'line'                       => $request->line,
            'flight'                     => $request->flight,
            'date_flight'                => $request->date_flight,
            'cr'                         => $request->cr,
            'incoterm'                   => $request->incoterm,
            'exporter_id'                => $request->exporter_id,
            'shipper'                    => $request->shipper,
            'consignee_id'               => $request->consignee_id,
            'destination_country'        => $request->destination_country,
            'airport'                    => $request->airport,
            'nro_invoices'               => $request->nro_invoices,
            'date_invoices'              => $request->date_invoices,
            'patent_id'                  => $request->patent_id,
            'sample_reception_date'      => $request->sample_reception_date,
            'date_crossing_pediment'     => $request->date_crossing_pediment,
            'recognition_id'             => $request->recognition_id,
            'recognition_departure_time' => $request->recognition_departure_time,
            'user_update'                => \Auth::user()->id

        ]);

        $export->save();

        /* UPDATE EVIDENCE */

        if( isset($export->evidence) && $export->evidence != '' ) {
            $evidences = explode(',',$export->evidence);
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

        $export->update([
            'evidence' => implode(',', $evidences)
        ]);

        $export->save();

        if(isset($files)){

            $path = public_path().'/files/exports/';
            $export_path = public_path().'/files/exports/'.$export->id.'/';
            if(!file_exists($export_path)){
                $this->file->makeDirectory($export_path, 0777, true);
            }

            foreach ($files as $file) {
                $original_name = $file->getClientOriginalName();
                $file->move($export_path, $original_name);
            }

        }

        /* UPDATE PERMISSIONS */

        $permissions = PermissionsExports::where('export_id', $export->id)->get();

        foreach( $permissions as $permission ) {
            $permission->forceDelete();
            
        }

        if( $request->has('permission') ){

            foreach( $request->permission as $key => $item ) {
                $permissionsExports = new PermissionsExports();
                $permissionsExports->export_id        = $export->id;
                $permissionsExports->permit           = $request->permission[$key];
                $permissionsExports->previous_balance = $request->previous_balance[$key];
                $permissionsExports->permit_discharge = $request->permit_discharge[$key];
                $permissionsExports->current_balance  = $request->current_balance[$key];
    
                $permissionsExports->save();
            }
        }

        /* UPDATE PRODUCTS */

        $products = ProductsExports::where('export_id', $export->id)->get();

        foreach( $products as $product ) {
            $product->forceDelete();
            
        }

        foreach( $request->product as $key => $item ) {
            $productsExports             = new ProductsExports();
            $productsExports->export_id  = $export->id;
            $productsExports->product_id = $request->product[$key];
            $productsExports->qty        = $request->qty[$key];
            $productsExports->unid       = $request->unid[$key];
            $productsExports->price      = $request->price[$key];
            $productsExports->fraccion   = $request->fraccion[$key];

            $productsExports->save();
        }

        /* UPDATE PEDIMENTS */

        $pediments = PedimentsExports::where('export_id', $export->id)->get();

        foreach( $pediments as $pediment ) {
            $pediment->forceDelete();
            
        }

        if( $request->has('pediment_id') ){
            foreach( $request->pediment_id as $key => $item ) {

                $pedimentsExports = new PedimentsExports();

                $pedimentsExports->export_id    = $export->id;
                $pedimentsExports->pediment_id  = $request->pediment_id[$key];
                $pedimentsExports->nro_pediment = $request->nro_pediment[$key];
                $pedimentsExports->date_pay     = $request->date_pay[$key];


                $pedimentsExports->save();
            }
        }

        /* UPDATE PROTOCOLS */

        $protocols = ProtocolsExports::where('export_id', $export->id)->get();

        foreach( $protocols as $protocol ) {
            $protocol->forceDelete();
        }

        if( $request->has('protocol_id') ){
            foreach( $request->protocol_id as $key => $item ) {
                $protocolsExports = new ProtocolsExports();
                $protocolsExports->export_id = $export->id;
                $protocolsExports->protocol_id  = $request->protocol_id[$key];

                $protocolsExports->save();
            }
        }

        /* UPDATE CARDS */

        $cards = CardsExports::where('export_id', $export->id)->get();

        foreach( $cards as $card ) {
            $card->forceDelete();
        }

        if( $request->has('card_id') ){
            foreach( $request->card_id as $key => $item ) {
                $cardsExports            = new CardsExports();
                $cardsExports->export_id = $export->id;
                $cardsExports->card_id   = $request->card_id[$key];

                $cardsExports->save();
            }
        }

        return redirect()->route('exports')->with('message_success', 'Exportacion actualizada');

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

        $export = Export::find($request->export);

        $export->update([
            'status_id' => $request->status_id,
            'observation' => $request->observation
        ]);

        $user = User::find($export->exporter->user_id);

        $dataNotification['user_id'] = $export->exporter->user_id;
        $dataNotification['notification'] = $request->observation;
        $dataNotification['status'] = $export->status->name;
        $dataNotification['reference'] = $export->reference;

        $notification = $this->notificationRepo->createNotification($dataNotification);

        NotificationEmail::notificationExport($export->exporter->email, $export);

        /* PUSH NOTIFICATION */

        $push_notification_key = env('PUSH_NOTIFICATION_KEY');    
        $url = "https://fcm.googleapis.com/fcm/send";            
        $header = array("authorization: key=" . $push_notification_key . "",
            "content-type: application/json"
        );    

        $postdata = '{
            "notification": {
                    "title":"Cambio de estatus",
                    "body" : "El estatus ha cambiado a: '.$export->status->name.'",
                    "sound":"default",
                    "click_action":"FCM_PLUGIN_ACTIVITY",
                    "icon":"fcm_push_icon"
                },
            "data":{
                "landing_page":"second",
                "estatus": "'.$export->status->name.'"
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


        return response()->json('Estatus Actualizado');

    }

    /**
     * Upload files evidence
     *
     * @param Request $request
     */
    public function filesEvidences(Request $request)
    {
        \Log::debug('files',[$request->file('file')]);

        $path = public_path() . '/files/exports/';
        $files = $request->file('file');
        // foreach ($files as $file) {
            
            $fileName = $files->getClientOriginalName();
            $files->move($path, $fileName);
        // }
        
    }

    /**
     * Delete the specified evidence.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteEvidence(Request $request, Export $export, $evidence)
    {
        $evidences = explode(',',$export->evidence);

        unset($evidences[$evidence]);

        $export->update([
            'evidence' => implode(',', $evidences)
        ]);

        $export->save();

        return redirect()->back()->with('message_success','La evidencia se elimino correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteProduct(Request $request, ProductsExports $product)
    {
        $product->forceDelete();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteProtocol(Request $request, ProtocolsExports $protocol)
    {
        $protocol->forceDelete();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCard(Request $request, CardsExports $card)
    {
        $card->forceDelete();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePermission(Request $request, PermissionsExports $permission)
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
    public function updateRecognition(Request $request, Export $export)
    {
        $export->update([
            'recognition_id' => $request->recognition_new,
            'observation'    => $request->observation
        ]);

        $export->save();

        NotificationEmail::notificationExport($export->exporter->email, $export);

        return redirect()->route('exports')->with('message_success', 'Reconocimiento aduanero actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Export $export)
    {
        $export->delete();
    }
}
