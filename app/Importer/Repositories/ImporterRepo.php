<?php
namespace App\Importer\Repositories;

use App\Importer\Entities\Importer;

/**
 * Class ImporterRepo
 *
 * @package App\Importer\Repositories
 * @author  Jorge Medina
 */
class ImporterRepo
{
    public function createImporter($data)
    {
        return Importer::create($data);
    }

        
    public function getAll($sort)
    {

        if( $sort === 'desc' ) {
            return Importer::all()->sortByDesc('name');
        }else{
            return Importer::all()->sortBy('name');
        }
    }

}
