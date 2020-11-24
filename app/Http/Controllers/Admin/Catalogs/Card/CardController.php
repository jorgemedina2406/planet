<?php

namespace App\Http\Controllers\Admin\Catalogs\Card;

use App\User\Entities\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use App\Http\Controllers\ApiController;

/* ENTITIES */
use App\Card\Entities\Card;

/* REPOSITORIES */
use App\Card\Repositories\CardRepo;

/* RESOURCE */
use App\Http\Resources\Card as CardResource;

/* LIB */
use PDF;
use Image;

class CardController extends ApiController
{
    private $cardRepo;

    public function __construct( CardRepo $cardRepo )
    {
        $this->cardRepo = $cardRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.catalogs.cards.index');
    }

    /**
     * Get data Cr.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataCard(Request $request)
    {

        $sort = $request->sort['sort'];
        $cards = $this->cardRepo->getAll($sort);
        
        return CardResource::collection($cards);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();

        $card = $this->cardRepo->createCard($data);

        return redirect()->back()->with('message_success', 'Carta agregado');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        $data['card'] = $card;
        
        return view('admin.catalogs.cards.edit', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view(Card $card)
    {
        $data['card'] = $card;
        
        return view('admin.catalogs.cards.view', $data);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {

        $card->update([
            'name'   => $request->name
        ]);

        $card->save();

        return redirect()->route('cards')->with('message_success', 'Carta actualizada');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Card $card)
    {
        $card->delete();
    }
}
