<?php

namespace App\Http\Controllers\Admin\Catalogs\Product;

use App\User\Entities\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notificaciones\NotificacionesType;
use App\Notificaciones\Notificaciones;
use Illuminate\Filesystem\Filesystem;
use App\Http\Controllers\ApiController;

/* ENTITIES */
use App\Product\Entities\Product;

/* REPOSITORIES */
use App\Product\Repositories\ProductRepo;

/* RESOURCE */
use App\Http\Resources\Product as ProductResource;

/* LIB */
use PDF;
use Image;

class ProductController extends ApiController
{
    private $productRepo;

    public function __construct( ProductRepo $productRepo )
    {
        $this->productRepo = $productRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.catalogs.products.index');
    }

    /**
     * Get data Product.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataProduct(Request $request)
    {

        $sort = $request->sort['sort'];

        $products = $this->productRepo->getAll($sort);
        
        return ProductResource::collection($products);
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

        $product = $this->productRepo->createProduct($data);

        return redirect()->back()->with('message_success', 'Producto agregado');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $data['product'] = $product;
        
        return view('admin.catalogs.products.edit', $data);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view(Product $product)
    {
        $data['product'] = $product;
        
        return view('admin.catalogs.products.view', $data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update([
            'name'        => $request->name,
            'code'        => $request->code,
            'description' => $request->description,
            'unid'        => $request->unid,
            'qty'         => $request->qty,
            'price'       => $request->price,
            'fraccion'    => $request->fraccion
        ]);

        $product->save();

        return redirect()->route('products')->with('message_success', 'Producto actualizado');

    }

    public function getProductById(Product $product) 
    {

        return $product;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        $product->delete();
    }
}
