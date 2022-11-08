<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

/**
 * Class VentaController
 * @package App\Http\Controllers
 */
class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Venta::paginate();

        return view('venta.index', compact('ventas'))
            ->with('i', (request()->input('page', 1) - 1) * $ventas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $venta = new Venta();
        $productos = Producto::all();

        $selected = -1;
        $array = [];
        $array = Arr::add($array, -1, 'Selecciona un Producto');
        foreach ($productos as $key) {
            $array = Arr::add($array, $key->id, $key->nombre);
        }

        return view('venta.create', compact('venta', 'selected', 'array'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Venta::$rules);

        $datos = $request->all();

        $producto = Producto::find($datos['producto_id']);

        if($datos['cantidad'] <= $producto->stock){
            $venta = Venta::create($request->all());
            $producto->stock = ($producto->stock - $datos['cantidad']);
            $producto->save();
        }
        else{
            return redirect()->route('ventas.index')
            ->with('warning', 'No se pudo realizar la Venta');
        }

        return redirect()->route('ventas.index')
            ->with('success', 'Compra creada Satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta = Venta::find($id);
        $producto = Producto::find($venta->producto_id);

        return view('venta.show', compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $venta = Venta::find($id);
        $productos = Producto::all();

        $selected = $venta->producto_id;
        $array = [];
        $array = Arr::add($array, -1, 'Selecciona un Producto');
        foreach ($productos as $key) {
            $array = Arr::add($array, $key->id, $key->nombre);
        }

        return view('venta.edit', compact('venta', 'selected', 'array'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Venta $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Venta::$rules);
        $datos = $request->all();

        $venta = Venta::find($id);
        $producto = Producto::find($datos['producto_id']);
        $cantidad = $producto->stock + $venta->cantidad;
        if($datos['cantidad'] <= $cantidad){
            $producto->stock = $cantidad - $datos['cantidad'];
            $producto->save();
            $venta->update($request->all());
        }
        else{
            return redirect()->route('ventas.index')
            ->with('warning', 'No se pudo realizar la actualizacion');
        }

        return redirect()->route('ventas.index')
            ->with('success', 'Compra Actualizada Satisfactoriamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $venta = Venta::find($id)->delete();

        return redirect()->route('ventas.index')
            ->with('success', 'Compra Eliminada Satisfactoriamente');
    }
}
