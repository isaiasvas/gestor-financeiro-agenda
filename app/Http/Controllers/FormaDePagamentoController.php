<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FormaDePagamento;
use Illuminate\Http\Request;

class FormaDePagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FormaDePagamento $formasdepagamento)
    {
        return view('formapagamento.index', ['formasdepagamento' => $formasdepagamento->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formasdepagamento = new FormaDePagamento();
        $formasdepagamento->fill($request->all());

        $formasdepagamento->save();

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
        $formasdepagamento = FormaDePagamento::find($request->id);
        $formasdepagamento->fill($request->all());
        $formasdepagamento->update();

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
        $formasdepagamento = FormaDePagamento::find($request->id);
        $formasdepagamento->delete();
        return response()->json(true);
    }
}
