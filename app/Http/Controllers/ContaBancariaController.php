<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CartaoDeCredito;
use Illuminate\Http\Request;

class ContaBancariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CartaoDeCredito $contasBancarias)
    {

        return view('contabancaria.index', ['contasBancarias' => $contasBancarias->where('tipo','1')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contabancaria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contasBancarias = new CartaoDeCredito;
        $contasBancarias->fill($request->all());

        $contasBancarias->save();

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
        $contasBancarias = CartaoDeCredito::find($request->id);
        $contasBancarias->fill($request->all());
        $contasBancarias->update();

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
        $contasBancarias = CartaoDeCredito::find($request->id);
        $contasBancarias->delete();
        return response()->json(true);
    }
}
