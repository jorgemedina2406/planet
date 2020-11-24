<?php
namespace App\Recognition\Repositories;

use App\Recognition\Entities\Recognition;

/**
 * Class RecognitionRepo
 *
 * @package App\Recognition\Repositories
 * @author  Jorge Medina
 */
class RecognitionRepo
{
    public function createRecognition($data)
    {
        $recognition = Recognition::create($data);

        return $recognition;
    }
    
    public function getAll($sort)
    {

        if( $sort === 'desc' ) {
            return Recognition::all()->sortByDesc('name');
        }else{
            return Recognition::all()->sortBy('name');
        }
    }

}
