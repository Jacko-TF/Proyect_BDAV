<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('product.index',compact('products'));
    }
    
    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request) {
        $product = new Product();

        $product->nombre = strtoupper($request->nombre);
        $product->marca = strtoupper($request->marca);
        $product->precio_compra = floatval($request->precio_compra);
        $product->precio_venta = floatval($request->precio_venta);
        $product->stock = intval($request->stock);

        $product->save();

        return redirect()->route('product.index')->with('success','Registro creado satisfactoriamente');
    }

    public function show($id)
    {
        $products=Product::find($id);
        return  view('producto.show',compact('products'));
    }

    public function edit($id)
    {
        $product=Product::find($id);
        return view('product.edit',compact('product'));
    }

    public function update(Request $request, $id) 
    {
        $product = Product::findOrFail($request->id);

        $product->nombre = strtoupper($request->nombre);
        $product->marca = strtoupper($request->marca);
        $product->precio_compra = floatval($request->precio_compra);
        $product->precio_venta = floatval($request->precio_venta);
        $product->stock = intval($request->stock);

        $product->save();

        return redirect()->route('product.index')->with('success','Registro actualizado satisfactoriamente');
    }

    public function destroy($id) 
    {   
        Product::destroy($id);
        return redirect()->route('product.index')->with('success','Registro eliminado satisfactoriamente');
    }
}