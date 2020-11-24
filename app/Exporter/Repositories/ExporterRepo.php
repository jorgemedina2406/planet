<?php
namespace App\Exporter\Repositories;

use App\Exporter\Entities\Exporter;

/**
 * Class ExporterRepo
 *
 * @package App\Exporter\Repositories
 * @author  Jorge Medina
 */
class ExporterRepo
{
    public function createExporter($data)
    {
        return Exporter::create($data);
    }

        
    public function getAll($sort)
    {

        if( $sort === 'desc' ) {
            return Exporter::all()->sortByDesc('name');
        }else{
            return Exporter::all()->sortBy('name');
        }
    }

}
