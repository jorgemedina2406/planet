<?php
namespace App\Card\Repositories;

use App\Card\Entities\Card;

/**
 * Class CardRepo
 *
 * @package App\Card\Repositories
 * @author  Jorge Medina
 */
class CardRepo
{
    public function createCard($data)
    {
        $card = Card::create($data);

        return $card;
    }
    
    public function getAll($sort)
    {

        if( $sort === 'desc' ) {
            return Card::all()->sortByDesc('name');
        }else{
            return Card::all()->sortBy('name');
        }
    }

}
