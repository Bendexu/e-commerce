<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categorias = DB::table('categorias')->select('id_categoria', 'categoria')->get();
        $usuarios = DB::table('usuarios')->select('id_usuario', 'username')->get();

        $productos = DB::select('CALL sp_MostrarProducto()');
        return view('productos/productos', compact('productos', 'categorias', 'usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage. 
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Obtener el producto con el ID proporcionado
        $producto = DB::table('productos')->where('id_producto', $id)->first();

        if (!$producto) {
            return redirect()->route('productos.index')->with('error', 'Producto no encontrado.');
        }

        // Pasar el producto a la vista detalleprod.blade.php
        return view('productos/producto.detalleproducto', compact('producto'));
    }
    


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Productos $productos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // 
    }

    public function image($id)
    {
        $producto = DB::table('productos')->where('id_producto', $id)->first();

        if ($producto && $producto->imagen) {
            return response($producto->imagen)->header('Content-Type', 'image/jpeg');
        }

        return response('Imagen no encontrada', 404);
    }
}
