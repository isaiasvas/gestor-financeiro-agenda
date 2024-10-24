<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conta;
use Carbon\Carbon;


class ContasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Conta $conta)
    {

        $venceHoje = 0;
        $aVencer = 0;
        $vencidas = 0;
        $pagas = 0;
        $lastid = 0;

        foreach ($conta->get() as $key => $value) {


            $lastid = $value->id;
        }

        return view('financeiro.index', [
            "contas" => $conta->orderBy('vencimento', 'asc')->get(),
            "venceHoje" => $venceHoje,
            "aVencer" => $aVencer,
            "vencidas" => $vencidas,
            "valorPago" => $pagas,
            "lastid" => $lastid,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('financeiro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valor = 0;
        $valor = str_replace(".", "", $request->valor);
        $valor = str_replace(",", ".", $valor);

        if (!$request->recorrente) {
            $conta = new Conta;

            $conta->fill($request->all());

            $conta->valor = floatval($valor);
            $conta->save();
        } else {

            for ($i = 0; $i < $request->repeticoes; $i++) {
                $date = new Carbon($request->vencimento);
                $conta = new Conta;
                $conta->fill($request->all());
                $conta->documento = $request->documento . '/' . $i;
                $conta->historico = $request->historico . '/' . $i;
                $conta->vencimento = $date->addMonths($i);
                $conta->valor = floatval($valor);
                $conta->save();
            }
        }
        return redirect()->route('financeiro.index')->withStatus(__('Conta inserida...'));
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


    public function replica($id)
    {
        $conta = Conta::find($id);

        $conta->valor = number_format((float)$conta->valor, 2, '.', '');

        return view('financeiro.replica', ["conta" => $conta]);
    }

    public function edit($id)
    {
        $conta = Conta::find($id);

        $conta->valor = number_format((float)$conta->valor, 2, '.', '');

        return view('financeiro.edit', ["conta" => $conta]);
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
        $conta = Conta::find($id);
        $conta->fill($request->all());
        $valor = str_replace(".", "", $request->valor);

        $valor = str_replace(",", ".", $valor);

        $conta->valor = floatval($valor);

        if (!$request->pago) {
            $conta->pago = 0;
        }

        if ($request->recorrente) {

            for ($i = 0; $i < $request->repeticoes; $i++) {
                $date = new Carbon($request->vencimento);
                $novaConta = new Conta();
                $novaConta->fill($request->all());
                $novaConta->documento = $request->documento . '/' . $i;
                $novaConta->historico = $request->historico . '/' . $i;
                $novaConta->vencimento = $date->addMonths($i);
                $novaConta->valor = floatval($valor);

                if (!$request->pago) {
                    $novaConta->pago = 0;
                    $novaConta->valorpago = $request->valorpago;
                    $novaConta->pagamento = $request->pagamento;
                }
                $novaConta->save();
            }
        }

        $conta->update();
        return redirect()->route('financeiro.index')->withStatus(__('Conta Atualizada...'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $conta = Conta::find($id);
        $conta->delete();
        return redirect()->route('financeiro.index')->withStatus(__('Conta Removida...'));
    }
}
