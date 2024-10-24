@extends('layouts.app')


@section('content')
<style>
    form#editar-financeiro label {
        font-size: 15px;
        font-weight: 400;
        text-align: right;
        vertical-align: text-bottom
    }

    form#editar-financeiro label[for='pago'] {
        font-weight: 600;
        color: #bbb;
    }

    form#editar-financeiro label[for='pago']:hover {
        color: #2d7e1f;
        text-decoration: underline;

    }


    @media only screen and (max-width:480px) {
        form#editar-financeiro label {
            font-size: 15px;
            font-weight: 400;
            text-align: left !important;
            vertical-align: text-bottom
        }
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content pt-2">
        <div class="container-fluid">
            <form id="editar-financeiro" class="justify-content-center" action="{{ route('financeiro.update', $conta->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 text-center">
                        <a class="btn btn-app bg-gradient-success" href="javascript:{}" onclick="document.getElementById('editar-financeiro').submit();">
                            <i class="fas fa-edit"></i> Salvar
                        </a>
                        <a class="btn btn-app bg-gradient-danger" href="javascript:{}" onclick="deletar()">
                            <i class="fas fa-trash"></i> Deletar
                        </a>
                        <a class="btn btn-app bg-info" href="{{route('financeiro.index')}}">
                            <i class="fas fa-times"></i> Cancelar
                        </a>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <!-- Identificação -->
                    <div class="col-xl-7  col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Informações de pagamento</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: block;">
                                <div class="row pb-3">
                                    <label for="categoria" class="col-sm-4 col-form-label">Categoria</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="categoria" id="categoria" required>
                                            <option> Selecione uma Categoria </option> @foreach ( $categorias as $key=>
                                            $category )
                                            <option value="{{$category->id}}" {{$conta->categoria == $category->id ? 'selected' : '' }}>
                                                &nbsp;{{$key+1}}&nbsp;{{ $category->categoria }}</option>
                                            @foreach ( $category->children as $childkey => $subCategory )
                                            <option value="{{$subCategory->id}}" {{$conta->categoria == $subCategory->id ? 'selected' : '' }}>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$key+1}}.{{$childkey+1}}&nbsp;{{$subCategory->categoria}}
                                            </option>
                                            @endforeach
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="row pb-3 ">
                                    <label for="bancooucartao" class="col-sm-4 col-form-label">Conta Bancária ou
                                        Cartão</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="bancooucartao" id="bancooucartao" required>
                                            <option> Conta Bancária ou Cartão </option>
                                            @foreach ( $bancooucartao as $key=> $cartaoDeCredito )
                                            <option value="{{$cartaoDeCredito->id}}" {{($cartaoDeCredito->id == $conta->bancooucartao ? 'selected' : '' )}}>
                                                {{ $cartaoDeCredito->descricao }}
                                            </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="row pb-3 ">
                                    <label for="formapagamento" class="col-sm-4 col-form-label">Forma de
                                        Pagamento</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="formapagamento" id="formapagamento" required>
                                            <option> Forma de Pagamento </option>
                                            @foreach ( $formasdepagamento as $key => $fdpg )
                                            <option value="{{$fdpg->id}}" {{$fdpg->id == $conta->formapagamento ? 'selected' : ''}}>
                                                {{ $fdpg->descricao }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row pb-3 ">
                                    <label for="clienteefornecedor" class="col-sm-4 col-form-label">Cliente ou
                                        Fornecedor</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="clienteefornecedor" id="clienteefornecedor" required>
                                            <option> Cliente ou Fornecedor </option>
                                            @foreach ( $clientesoufornecedores as $key=>
                                            $clienteoufornecedor )
                                            <option value="{{$clienteoufornecedor->id}}" {{$clienteoufornecedor->id == $conta->clienteefornecedor ? 'selected' : ''}}> {{$clienteoufornecedor->nome}} </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="row pt-3 pb-3">
                                    <label class="col-sm-4 col-form-label" for="descricao">Descrição</label>
                                    <div class="col-sm-8">
                                        <input required type="text" class="form-control" id="descricao" name="descricao" value="{{$conta->descricao}}" placeholder="Descrição">
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <label class="col-sm-4 col-form-label" for="documento">Documento</label>
                                    <div class="col-sm-8">
                                        <input required type="text" class="form-control" id="documento" name="documento" value="{{$conta->documento }}" placeholder="Documento">
                                    </div>
                                </div>

                                <div class="row mb-3" style="background:#fffdd5;">
                                    <label for="tipodelancamento" class="col-auto col-sm-4  col-form-label">Tipo de
                                        Lançamento </label>
                                    <div class="col-sm-auto row ml-2 mt-2">
                                        <div class="col-auto custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="despesa" name="tipolancamento" value="0">
                                            <label for="despesa" style="color:#ef4a01; font-weight:600" class="custom-control-label">DESPESA</label>
                                        </div>
                                        <div class="col-auto custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="receita" name="tipolancamento" value="1">
                                            <label for="receita" style="color:#06d;font-weight:600" class="custom-control-label">RECEITA</label>
                                        </div>
                                        <div class="col-auto custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="pago" name="pago" value="1">
                                            <label for="pago" class="custom-control-label">Lançamento Pago</label>
                                        </div>
                                    </div>
                                    <div>

                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <label for="vencimento" class="col-sm-4  col-form-label">Data do Vencimento</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control docs-date" id="vencimento" name="vencimento" placeholder="DD/MM/YYYY" autocomplete="off">
                                    </div>
                                    <label for="valor-a-pagar" class="col-sm-auto col-form-label">Valor</label>
                                    <div class="col-sm-4">

                                        <input required type="text" class="form-control" id="valor-a-pagar" name="valor" value="{{$conta->valor }}" placeholder="Valor a Pagar">
                                    </div>
                                </div>
                                <div class="row pb-3 ">
                                    <label for="pagamento" class="col-sm-4  col-form-label">Data do Pagamento</label>
                                    <div class="col-sm-3">
                                        <input type="text" disabled class="form-control docs-date" id="pagamento" name="pagamento" placeholder="DD/MM/YYYY" autocomplete="off">
                                    </div>
                                    <label for="valorpago" class="col-sm-auto col-form-label">Valor</label>
                                    <div class="col-sm-4">
                                        <input disabled type="text" class="form-control" id="valorpago" name="valorpago" value="{{$conta->valorpago }}" placeholder="Valor Pago">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group col-md-12 col-lg-12">
                                    <label for="observacao">Observação</label>
                                    <textarea type="text" class="form-control" id="observacao" name="observacao" placeholder="Observação"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <a class="btn btn-app bg-gradient-success" href="javascript:{}" onclick="document.getElementById('editar-financeiro').submit();">
                            <i class="fas fa-edit"></i> Salvar
                        </a>
                        <a class="btn btn-app bg-gradient-danger" href="javascript:{}" onclick="deletar()">
                            <i class="fas fa-trash"></i> Deletar
                        </a>
                        <a class="btn btn-app bg-info" href="{{route('financeiro.index')}}">
                            <i class="fas fa-times"></i> Cancelar
                        </a>
                    </div>
                </div>
            </form>
            <form action="{{ route('financeiro.destroy', $conta->id)}}" method="post" id="deletar-financeiro">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </section>
</div>

@endsection

@push('js')
<script>
    function deletar() {
        document.getElementById('deletar-financeiro').submit();
    }

    $("input[name='tipolancamento']").on('change', function() {
        if ($("input[name='tipolancamento']:checked").val() == 1) {
            $("label[for='pagamento']").text('Data do Recebimento');
        } else {
            $("label[for='pagamento']").text('Data do Pagamento');
        }
    });

    $("#pago").on('change', function() {
        if ($("#pago").is(':checked')) {
            $("label[for='pago']").css('color', '#2d7e1f')
            $("label[for='pago']").css('text-decoration', 'underline')
            $("input[name='pagamento']").datepicker('setDate', $("input[name='vencimento']").datepicker('getDate'));
            $("input[name='pagamento']").attr('disabled', false);
            $("input[name='valorpago']").attr('disabled', false).val($("input[name='valor']").val());
        } else {
            $("input[name='pagamento']").attr('disabled', true);
            $("input[name='pagamento']").datepicker('reset');
            $("input[name='valorpago']").val('');
            $("input[name='valorpago']").attr('disabled', true);
            $("label[for='pago']").css('color', '#bbb')
            $("label[for='pago']").css('text-decoration', 'none')
        }
    })

    $(document).ready(function() {

        if ('{{$conta->tipolancamento}}' == 0) {
            $("input[name='tipolancamento']#despesa").attr('checked', true)
        } else {
            $("label[for='pagamento']").text('Data do Recebimento');
            $("input[name='tipolancamento']#receita").attr('checked', true)
        }


        if ('{{$conta->pago}}' == 1) {
            $("#pago").attr('checked', true);
            $("input[name='pagamento']").attr('disabled', false);
            $("input[name='valorpago']").attr('disabled', false).val('{{ $conta->valorpago }})');
            $("label[for='pago']").css('color', '#2d7e1f')
            $("label[for='pago']").css('text-decoration', 'underline')
        }
        $("select").select2({
            theme: 'bootstrap-5'
        })

        $("input#pagamento ").datepicker({
            format: 'dd-mm-yyyy',
            language: 'pt-BR',
            autoHide: true,
            date: moment()
        });
        if ('{{$conta->pagamento}}' != '') {
            $("input#pagamento").datepicker('setDate', '{{$conta->pagamento}}');
        }

        $("input#vencimento").datepicker({
            format: 'dd-mm-yyyy',
            language: 'pt-BR',
            autoHide: true,
            date: moment()
        });
        $("input#vencimento").datepicker('setDate', '{{$conta->vencimento}}')

        $("input[name='valor']").mask('000.000.000.000.000,00', {
            reverse: true
        });

        $("input[name='valorpago']").mask('000.000.000.000.000,00', {
            reverse: true
        });
    });
</script>
@endpush