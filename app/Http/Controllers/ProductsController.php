<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Resources\ProductsCollection;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show'] ]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Muestra una colección del recurso
        $productos = Product::paginate(10);

        if ($request->wantsJson()) 
        {
            return new ProductsCollection($productos);
        }

        return view('products.index', ['products' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mostrar formulario para crear nuevo producto

        $product = new Product;

        return view('products.create', ['product' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Almacenar en base de datos nuevos productos (info que viene de create)

        $options = array(
            'title' => $request->title, 
            'description' => $request->description, 
            'price' => $request->price
        );

        //if (App\Product::cretae($options)) {
        if (Product::create($options)) {
          return redirect('productos');
        } else {
            return redirect('products.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Muestra un recurso

        $product = Product::find($id);

        return view('products.show', ['product' => $product] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Muestra un formulario para editar producto

        $product = Product::find($id);

        return view('products.edit', ['product' => $product] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Actualizar info de un producto (info viene de edit)

        $product = Product::find($id);

        $product->title = $request->title;
        $product->price = $request->price;
        $product->description = $request->description;

        if ($product->save()) {
            return redirect('/');
        } else {
            return view('products.edit', ['product' -> $product]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Elimina un recurso
        $product = Product::destroy($id);

        return redirect('/productos');
    }
}
