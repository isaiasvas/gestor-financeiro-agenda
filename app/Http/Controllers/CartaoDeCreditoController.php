<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CartaoDeCredito;
use Illuminate\Http\Request;

class CartaoDeCreditoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CartaoDeCredito $cartaoDeCredito)
    {

        return view('cartaodecredito.index', ['cartoesdecredito' => $cartaoDeCredito->where('tipo','0')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cartaodecredito.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cartaoDeCredito = new CartaoDeCredito;
        $cartaoDeCredito->fill($request->all());

        $cartaoDeCredito->save();

        return response()->json(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $cartaoDeCredito = CartaoDeCredito::find($request->id);
        $cartaoDeCredito->fill($request->all());
        $cartaoDeCredito->update();

        return response()->json(true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $cartaoDeCredito = CartaoDeCredito::find($request->id);
        $cartaoDeCredito->delete();
        return response()->json(true);
    }
}
