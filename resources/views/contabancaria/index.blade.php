@extends('layouts.app')
<style>
    table thead {
        border-top: 1px solid #f5f5f5;
        background-image: linear-gradient(#ffffff, #EDEDED);
        border-bottom: 1px solid #f5f5f5 !important;
    }

    @media only screen and (min-width:1024px) {
        .offcanvas {
            width: 500px !important;
        }
    }

    @media only screen and (max-width:768px) {
        .project-actions a.btn-danger {
            margin-top: 1em;
        }

        table td {

            text-align: right !important;
            vertical-align: middle !important;
        }

        .offcanvas label {
            text-align: left !important;
        }
    }
</style>
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-white">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 pt-2 pr-4 pt-5 pb-2">
                            <button class="btn bg-gradient-info shadow" onclick="createContasBancarias()" data-bs-toggle="offcanvas" data-bs-target="#ContaBancariaoffcanvas" aria-controls="ContaBancariaoffcanvas"><i class="fas fa-plus"></i> Adicionar</button>

                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-body p-0">


                            <table class="table table-fit table-borderless" data-mobile-responsive="true" data-check-on-init="true" data-toggle="table" data-click-to-select="true" data-locale="PT-BR">
                                <thead class="text-center">
                                    <tr>
                                        <th data-field="id" data-width="1" data-width-unit="%" style="width: 1%">
                                            #ID
                                        </th>
                                        <th data-field="agencia" data-width="10" data-width-unit="%" style="width: 15%">
                                            Agencia
                                        </th>
                                        <th data-field="numero" data-width="10" data-width-unit="%" style="width: 5%">
                                            Numero
                                        </th>
                                        <th data-field="digito" data-width="10" data-width-unit="%" style="width: 5%">
                                            Digito
                                        </th>
                                        <th data-field="descricao" data-width="25" data-width-unit="%" style="width: 15%">
                                            Descricao
                                        </th>
                                        <th data-field="situacao" data-width="10" data-width-unit="%" style="width: 15%">
                                            Situacao
                                        </th>
                                        <th data-width="30" data-width-unit="%" style="width: 30%">
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="text-center">
                                    @foreach ( $contasBancarias as $key => $conta )
                                    <tr data-value="{{$conta}}">
                                        <td>
                                            #{{$conta->id}}
                                        </td>
                                        <td>
                                            {{$conta->agencia}}
                                        </td>
                                        <td>
                                            {{$conta->numero}}
                                        </td>
                                        <td>
                                            {{$conta->digito}}
                                        </td>
                                        <td>
                                            {{$conta->descricao}}
                                        </td>
                                        <td>
                                            {{$conta->situacao ? 'Ativo' : 'Desativado' }}
                                        </td>

                                        <td class="project-actions text-right">

                                            <a class="btn btn-info btn-sm" href="javascript:{}" data-bs-toggle="offcanvas" data-bs-target="#ContaBancariaoffcanvas" aria-controls="ContaBancariaoffcanvas" onclick="editContaBancaria({{$conta}})">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Editar
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="javascript:{}" onclick="deleteCartaoDeCreditoo('{{$conta->id}}')">
                                                <i class="fas fa-trash">
                                                </i>
                                                Apagar
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="offcanvas offcanvas-end" tabindex="-1" data-bs-scroll="false" data-bs-backdrop="false" id="ContaBancariaoffcanvas" aria-labelledby="ContaBancariaoffcanvasLabel">
    <div class="offcanvas-header bg-gradient-info">
        <h5 class="offcanvas-title" id="ContaBancariaoffcanvasLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form class="form-horizontal">

            <div class="form-group row">
                <label for="agencia" class="col-sm-5 text-right col-form-label">Agencia</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="agencia" name="agencia" placeholder="Digite o numero da agencia do banco">
                </div>
            </div>
            <div class="form-group row">
                <label for="numero" class="col-sm-5 text-right col-form-label">Número </label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="numero" name="numero" placeholder="Digite o Numero da Conta">
                </div>
            </div>
            <div class="form-group row">
                <label for="digito" class="col-sm-5 text-right col-form-label">Digito </label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="digito" name="digito" placeholder="Digito da conta">
                </div>
            </div>
            <div class="form-group row">
                <label for="descricao" class="col-sm-5 text-right col-form-label">Descrição </label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Breve descrição">
                </div>
            </div>

            <div class="form-group row" id="situacaoRow">
                <label for="situacao" class="col-sm-5 text-right col-form-label">Situação </label>
                <div class="col-auto custom-control custom-radio ml-2 mt-2">
                    <input class="custom-control-input" type="radio" id="desativado" name="situacao" value="0">
                    <label for="desativado" style=" font-weight:600" class="custom-control-label">DESATIVADO</label>
                </div>
                <div class="col-auto custom-control custom-radio mt-2">
                    <input class="custom-control-input" type="radio" id="ativado" name="situacao" value="1">
                    <label for="ativado" style="font-weight:600" class="custom-control-label">ATIVADO</label>
                </div>
            </div>

            <input type="hidden" name="id" id="id">
        </form>
    </div>
    <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-app bg-gradient-success save" onclick="saveContaBancaria()">Salvar</button>
        <button type="button" class="btn btn-app bg-gradient-danger delete" style="display:none" onclick="deleteContaBancaria()">Deletar</button>
        <button type="button" class="btn btn-app bg-gradient-info" data-bs-dismiss="offcanvas">Fechar</button>

    </div>

</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        $("#ContaBancariaoffcanvas [name='situacao']").on('change', function() {

        })

    })

    $('.table').bootstrapTable({
        onClickRow: function(row, $element) {

        },
        onDblClickRow: function(row, $element, field) {
            var myOffcanvas = document.getElementById('ContaBancariaoffcanvas')
            var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas)
            bsOffcanvas.toggle()
            editContaBancaria(row._data.value);

        }
    });

    function createContasBancarias() {
        resetForm();

        $(".delete").css('display', 'none');
        $("#ContaBancariaoffcanvas #ContaBancariaoffcanvasLabel").text('Adicionando Cartão de Crédito')
        $("#situacaoRow").css('display', 'none');
    };



    function editContaBancaria(contaBancaria) {
        resetForm();
        $("#situacaoRow").css('display', 'flex');
        $(".delete").css('display', 'block');
        $("#ContaBancariaoffcanvas #ContaBancariaoffcanvasLabel").text('Editando Cartão de Crédito');
        $("#ContaBancariaoffcanvas input[name='id']").val(contaBancaria.id);
        $("#ContaBancariaoffcanvas input[name='agencia']").val(contaBancaria.agencia);
        $("#ContaBancariaoffcanvas input[name='numero']").val(contaBancaria.numero);
        $("#ContaBancariaoffcanvas input[name='digito']").val(contaBancaria.digito);
        $("#ContaBancariaoffcanvas input[name='descricao']").val(contaBancaria.descricao);
        if (contaBancaria.situacao == 0) {
            $("#ContaBancariaoffcanvas #desativado").attr('checked', true);
        } else {
            $("#ContaBancariaoffcanvas #ativado").attr('checked', true);
        }
    };

    function resetForm() {
        $("#ContaBancariaoffcanvas input[name='id']").val('');
        $("#ContaBancariaoffcanvas input[name='descricao']").val('');
        $("#ContaBancariaoffcanvas input[name='agencia']").val('');
        $("#ContaBancariaoffcanvas input[name='numero']").val('');
        $("#ContaBancariaoffcanvas input[name='digito']").val('');

    };

    function saveContaBancaria() {

        let id = $("#ContaBancariaoffcanvas input[name='id']").val();
        let agencia = $("#ContaBancariaoffcanvas input[name='agencia']").val();
        let numero = $("#ContaBancariaoffcanvas input[name='numero']").val();
        let digito = $("#ContaBancariaoffcanvas input[name='digito']").val();
        let descricao = $("#ContaBancariaoffcanvas input[name='descricao']").val();
        let desativado = $("#ContaBancariaoffcanvas #desativado").is(':checked');
        let situacao = desativado ? 0 : 1;

        let Event = {
            agencia: agencia,
            numero: numero,
            digito: digito,
            descricao: descricao,
            situacao: 1,
            tipo: '1'
        }

        let route;
        if (id == '') {
            route = '{{route("cartaodecredito.store")}}';
            Event._method = 'POST';
        } else {
            route = '{{route("cartaodecredito.update")}}';
            Event.id = id;
            Event._method = 'PUT';
        }
        sendEvent(route, Event);
    };


    function sendEvent(route, data_) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: route,
            data: data_,
            method: 'POST',
            dataType: 'json',
            success: function(json) {
                if (json) {
                    location.reload();
                }
            },
            error: function(json) {
                let responseJson = json.responseJSON.errors;

                $("#message").html(loadErrors(responseJson));
            }
        });
    }

    function deleteContaBancaria() {

        let id = $("#ContaBancariaoffcanvas input[name='id']").val();
        let Event = {
            _method: 'DELETE',
            id: id
        };
        let route = '{{route("cartaodecredito.delete")}}'

        sendEvent(route, Event)
    };


    function deleteCartaoDeCreditoo(id) {
        let Event = {
            _method: 'DELETE',
            id: id
        };
        let route = '{{route("cartaodecredito.delete")}}'

        sendEvent(route, Event)
    };

    function loadErrors(response) {
        let boxAlert = `<div class="alert alert-danger" role="alert">`;

        setTimeout(function() {
            $(".alert").alert('close');
        }, 5000);

        for (let fields in response) {
            console.log(response[fields]);
            boxAlert += `<span>${response[fields]}</span><br/>`;
        }

        boxAlert += `</div>`;

        return boxAlert.replace(',', '<br/>');
    }
</script>
@endpush