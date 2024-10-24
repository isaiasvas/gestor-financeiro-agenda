<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Conta;
use App\Models\ContaView;
use App\Models\CartaoDeCredito;
use App\Models\ClienteOuFornecedor;
use App\Models\FormaDePagamento;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ContasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Conta $contas)
    {

        $saldos = ContaView::select(
            DB::raw('date_format(data, "%d/%m/%Y") as data'),
            DB::raw('SUM(if(tipo = 1, valor, 0)) as debito'),
            DB::raw('SUM(if(tipo = 0, valor, 0)) as credito'),
            DB::raw('(select sum(if(tipo = 0, -valor,valor)) from vw_extrato as L2
                where date_format(vw_extrato.data,"%Y%m") >= DATE_FORMAT(L2.data, "%Y%m")
            ) as saldo'),
        )->groupBy(DB::raw('YEAR(data)'), DB::raw('MONTH(data)'))->get();


        if ($contas->get()->last()) {
            $lastid = $contas->get()->last()->id + 1;
        } else {
            $lastid = 0;
        }
        return view('financeiro.index', [
            "contas" => $contas->get(),
            "lastid" => $lastid,
            "saldos" => $saldos,

        ]);
    }

    public function month(Request $request)
    {

        $contas = Conta::whereYear('vencimento', $request->year)->whereMonth('vencimento', $request->month)->get();



        return response()->json($contas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create(Categoria $categorias, CartaoDeCredito $cartaoDeCredito, ClienteOuFornecedor $clienteOuFornecedor, FormaDePagamento $formasdepagamento)
    {
        return view('financeiro.create', [
            'categorias' => $categorias->where('categoria_id', null)->get(),
            'cartoesdecredito' => $cartaoDeCredito->get(),
            'formasdepagamento' => $formasdepagamento->get(),
            'clientesoufornecedores' => $clienteOuFornecedor->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $contas = new Conta;
        $contas->fill($request->all());
      
        $contas->valor = str_replace('.', '', $contas->valor);
        $contas->valor = str_replace(',', '.', $contas->valor);
        if ($request->tipolancamento == 1) {
            $contas->tipolancamento = true;
        } else {
            $contas->tipolancamento = false;
        }

        $contas->save();
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

    public function edit($id, Categoria $categorias, CartaoDeCredito $cartaoDeCredito,ClienteOuFornecedor $clienteOuFornecedor, FormaDePagamento $formasdepagamento)
    {
        $conta = Conta::find($id);

        $conta->valor = number_format((float)$conta->valor, 2, '.', '');
        $conta->valorpago = number_format((float)$conta->valorpago, 2, '.', '');
        return view('financeiro.edit', [
            "conta" => $conta,
            'categorias' => $categorias->where('categoria_id', null)->get(),
            'bancooucartao' => $cartaoDeCredito->get(),
             'formasdepagamento' => $formasdepagamento->get(),
            'clientesoufornecedores' => $clienteOuFornecedor->get()
        ]);
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


        if (isset($request->valor)) {
            $valor = str_replace(".", "", $request->valor);
            $valor = str_replace(",", ".", $valor);
            $conta->valor = floatval($valor);
        }
        if (isset($request->valorpago)) {
            $valorpago = str_replace(".", "", $request->valorpago);
            $valorpago = str_replace(",", ".", $valorpago);
            $conta->valorpago = floatval($valorpago);
        }

        if (!$request->pago) {
            $conta->pago = 0;
            $conta->pagamento = null;
            $conta->valorpago = null;
        } else {
            $conta->pago = 1;
        }

        if ($request->retorno == 1) {
            $conta->pagamento = Carbon::now()->toDateTimeString();

            $conta->valorpago = $conta->valor;
        }


        $conta->update();
        if ($request->retorno == 1) {
            return true;
        } else {
            return redirect()->route('financeiro.index')->withStatus(__('Conta Atualizada...'));
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
        $conta = Conta::find($id);
        $conta->delete();
        return redirect()->route('financeiro.index')->withStatus(__('Conta Removida...'));
    }
}
