@extends('layouts.app')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content pt-2">
        <div class="container-fluid">
            <form action="{{ route('financeiro.store') }}" method="post">
                <div class="row">
                    @csrf
                    @method('POST')
                    <div class="col-md-4">
                        <div class="card bg-body shadow">
                            <div class="card-body">
                                <div class="row col-md-12">
                                    <div class="form-group">
                                        <label for="codigo-de-barras">Codigo de Barras</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="codigo-de-barras" name="codigodebarras" value="{{$conta->codigodebarras}}" placeholder="Codigo de Barras">
                                            <div class="input-group-append">
                                                <div class="input-group-text" style="cursor:pointer" onclick="lerCodBar()"><i data-feather="search"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="documento">Documento</label>
                                        <input required type="text" class="form-control" id="documento" name="documento" value="{{$conta->documento}}_copia" placeholder="Documento">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="historico">Historico</label>
                                        <input required type="text" class="form-control" id="historico" name="historico" value="{{$conta->historico}}_copia" placeholder="Historico">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="descricao">Descrição</label>
                                        <input type="text" class="form-control" id="descricao" name="descricao" value="{{$conta->descricao}}" placeholder="Descrição">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="emissao">Emissão</label>
                                        <div class="input-group date" id="emissao" data-target-input="nearest">
                                            <input required type="text" class="form-control datetimepicker-input" name="emissao" value="{{date_format($conta->emissao, 'd-m-y')}}" data-target="#emissao" placeholder="Emissão" />
                                            <div class="input-group-append" data-target="#emissao" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i data-feather="calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="vencimento">Vencimento</label>
                                        <div class="input-group date" id="vencimento" data-target-input="nearest">
                                            <input required type="text" class="form-control datetimepicker-input" name="vencimento" value="{{date_format($conta->vencimento, 'd-m-y')}}" data-target="#vencimento" placeholder="Vencimento" />
                                            <div class="input-group-append" data-target="#vencimento" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i data-feather="calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="valor-a-pagar">Valor</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <div class="input-group-text"><i data-feather="dollar-sign"></i></div>
                                            </div>
                                            <input required type="text" class="form-control" id="valor-a-pagar" name="valor" value="{{$conta->valor}}" placeholder="Valor a pagar">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group col-md-12">
                                    <label for="observacao">Observação</label>
                                    <textarea type="text" class="form-control" id="observacao" name="observacao" value="{{$conta->observacao}}" placeholder="Observação"></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer  text-center">
                                <button type="submit" class="btn btn-app">
                                    <i data-feather="edit"></i></br>
                                    Atualizar
                                </button>
                                <a class="btn btn-app" href="{{route('financeiro.index')}}">
                                    <i data-feather="x"></i>
                                    </br>
                                    Cancelar
                                </a>
                                <button class="btn btn-app" type="button" data-bs-toggle="modal" data-bs-target="#myModal"><i data-feather="trash"></i></br>Deletar</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-body shadow">
                            <div class="card-body">
                                <div class="row col-md-12">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" name="pago" value="1" id="pagar-conta" {{$conta->pago ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="pagar-conta">Pagar conta</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="pagamento">Pagamento</label>
                                        <div class="input-group date" id="pagamento" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" id="input-pagamento" name="pagamento" value="{{$conta->pago ? date_format($conta->pagamento, 'd-m-y') : '' }}" data-target="#pagamento" placeholder="Pagamento" {{$conta->pago ? '':'disabled'}} />
                                            <div class="input-group-append" data-target="#pagamento" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i data-feather="calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="valor-pago">Valor Pago</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <div class="input-group-text"><i data-feather="dollar-sign"></i></div>
                                            </div>
                                            <input type="text" class="form-control" id="valor-pago" name="valorpago" value="{{$conta->pago ? $conta->valorpago : ''}}" placeholder="Valor pago" {{$conta->pago ? '':'disabled'}}>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer  text-center">
                                <button type="submit" class="btn btn-app pagar">
                                    <i data-feather="check-square"></i></br>
                                    Pagar
                                </button>
                                <a class="btn btn-app" href="{{route('financeiro.index')}}">
                                    <i data-feather="x"></i>
                                    </br>
                                    Cancelar
                                </a>
                            </div>
                        </div>
                        <div class="card bg-body shadow">
                            <div class="card-body">
                                <div class="row col-md-12">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" name="recorrente" value="1" id="recorrente">
                                            <label class="custom-control-label" for="recorrente">Pagamento recorrente</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="repeticoes">Quantos meses repetir pagamento?</label>
                                        <input type="number" class="form-control" id="repeticoes" name="repeticoes" placeholder="Repetições">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

@endsection

@push('js')
<script>
    $(document).ready(function() {
        $("#recorrente").on('change', function() {
            if ($("#recorrente").prop('checked')) {
                $("#repeticoes").prop('disabled', false)
            } else {
                $("#repeticoes").prop('disabled', true)
            }
        });
        $("#repeticoes").prop('disabled', true)

        $('#emissao').datetimepicker({
            format: 'DD-MM-YYYY',

        });
        $('#vencimento').datetimepicker({
            format: 'DD-MM-YYYY',

        });
        $('#pagamento').datetimepicker({
            format: 'DD-MM-YYYY',

        });

        $("#valor-a-pagar").mask('000.000.000.000.000,00', {
            reverse: true
        });
        $("#valor-pago").mask('000.000.000.000.000,00', {
            reverse: true
        });
    });
    $("#pagar-conta").on('change', function() {
        if ($("#pagar-conta").prop('checked')) {

            $("#valor-pago").prop('disabled', false);
            $("#valor-pago").val($("#valor-a-pagar").val());
            $("#input-pagamento").prop('disabled', false);
            $("#pagamento input").val(moment().format('D-MM-Y'));
        } else {
            $("#valor-pago").prop('disabled', true);
            $("#valor-pago").val('');
            $("#input-pagamento").prop('disabled', true);
            $("#input-pagamento").val('');
        }
    })

    function lerCodBar() {

    }
</script>
@endpush