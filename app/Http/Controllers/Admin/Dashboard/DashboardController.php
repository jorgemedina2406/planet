<?php

namespace App\Http\Controllers\Admin\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;

// ENTITIES
// use App\Dashboard\Entities\Dashboard;
use App\User\Entities\User;

/* REPOSITORIES */
use App\Export\Repositories\ExportRepo;
use App\Import\Repositories\ImportRepo;

/* RESOURCE */
use App\Http\Resources\Export as ExportResource;

// REPOSITORIES
use App\Dashboard\Repositories\DashboardRepo;

// RESOURCE
use App\Http\Resources\Dashboard as DashboardResource;

// LIB
use PDF;
use Image;

class DashboardController extends Controller
{
    private $exportRepo;
    private $importRepo;

    public function __construct( ExportRepo $exportRepo, ImportRepo $importRepo )
    {
        $this->exportRepo = $exportRepo;
        $this->importRepo = $importRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $sort = 'asc';

        $exports = $this->exportRepo->getAll($sort);
        $imports = $this->importRepo->getAll($sort);

        $data['importNew']       = $this->importRepo->getImportsNew();
        $data['importCancel']    = $this->importRepo->getImportsCancel();
        $data['importProcess']   = $this->importRepo->getImportsProcess();
        $data['importFinish']    = $this->importRepo->getImportsFinish();
        $data['importRevalid']   = $this->importRepo->getImportsRevalid();
        $data['importDespacho']  = $this->importRepo->getImportsDespacho();
        $data['importRed']       = $this->importRepo->getImportsRed();
        $data['importGreen']     = $this->importRepo->getImportsGreen();
        $data['importDelivered'] = $this->importRepo->getImportsDelivered();

        $data['exportNew']       = $this->exportRepo->getExportsNew();
        $data['exportCancel']    = $this->exportRepo->getExportsCancel();
        $data['exportProcess']   = $this->exportRepo->getExportsProcess();
        $data['exportFinish']    = $this->exportRepo->getExportsFinish();
        $data['exportRevalid']   = $this->exportRepo->getExportsRevalid();
        $data['exportDespacho']  = $this->exportRepo->getExportsDespacho();
        $data['exportRed']       = $this->exportRepo->getExportsRed();
        $data['exportGreen']     = $this->exportRepo->getExportsGreen();
        $data['exportDelivered'] = $this->exportRepo->getExportsDelivered();

        $data['enero']      = $this->exportRepo->getExportsEnero();
        $data['febrero']    = $this->exportRepo->getExportsFebrero();
        $data['marzo']      = $this->exportRepo->getExportsMarzo();
        $data['abril']      = $this->exportRepo->getExportsAbril();
        $data['mayo']       = $this->exportRepo->getExportsMayo();
        $data['junio']      = $this->exportRepo->getExportsJunio();
        $data['julio']      = $this->exportRepo->getExportsJulio();
        $data['agosto']     = $this->exportRepo->getExportsAgosto();
        $data['septiembre'] = $this->exportRepo->getExportsSeptiembre();
        $data['octubre']    = $this->exportRepo->getExportsOctubre();
        $data['noviembre']  = $this->exportRepo->getExportsNoviembre();
        $data['diciembre']  = $this->exportRepo->getExportsDiciembre();

        $data['eneroIm']      = $this->importRepo->getImportsEnero();
        $data['febreroIm']    = $this->importRepo->getImportsFebrero();
        $data['marzoIm']      = $this->importRepo->getImportsMarzo();
        $data['abrilIm']      = $this->importRepo->getImportsAbril();
        $data['mayoIm']       = $this->importRepo->getImportsMayo();
        $data['junioIm']      = $this->importRepo->getImportsJunio();
        $data['julioIm']      = $this->importRepo->getImportsJulio();
        $data['agostoIm']     = $this->importRepo->getImportsAgosto();
        $data['septiembreIm'] = $this->importRepo->getImportsSeptiembre();
        $data['octubreIm']    = $this->importRepo->getImportsOctubre();
        $data['noviembreIm']  = $this->importRepo->getImportsNoviembre();
        $data['diciembreIm']  = $this->importRepo->getImportsDiciembre();
        
        $data['importsCount'] = count($imports);
        
        $data['exports'] = ExportResource::collection($exports);
        $data['users'] = User::where('login_date', '<', \DB::raw('NOW() + INTERVAL 1 DAY'))->limit(10)->get();

        
        return view('admin.dashboard.dashboard', $data);
    }

}
