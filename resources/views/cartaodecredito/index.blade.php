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
                        <button class="btn bg-gradient-info shadow" onclick="createCartaoDeCredito()" data-bs-toggle="offcanvas" data-bs-target="#cartaodecreditooffcanvas" aria-controls="cartaodecreditooffcanvas"><i class="fas fa-plus"></i> Adicionar</button>

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
                                    <th data-field="descricao" data-width="15" data-width-unit="%" style="width: 15%">
                                        Cartão
                                    </th>
                                    <th data-field="dia_fechamento" data-width="5" data-width-unit="%" style="width: 5%">
                                        Fechamento
                                    </th>
                                    <th data-field="dia_vencimento" data-width="5" data-width-unit="%" style="width: 5%">
                                        Vencimento
                                    </th>
                                    <th data-field="limite" data-width="15" data-width-unit="%" style="width: 15%">
                                        Limite
                                    </th>
                                    <th data-field="disponivel" data-width="15" data-width-unit="%" style="width: 15%">
                                        Disponível
                                    </th>
                                    <th data-width="30" data-width-unit="%" style="width: 30%">
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="text-center">
                                @foreach ( $cartoesdecredito as $key => $cartaodecredito )
                                <tr data-value="{{$cartaodecredito}}">
                                    <td>
                                        #{{$cartaodecredito->id}}
                                    </td>
                                    <td>{{$cartaodecredito->descricao}}
                                    </td>
                                    <td>
                                        {{$cartaodecredito->dia_fechamento}}
                                    </td>
                                    <td class="project_progress">
                                        {{$cartaodecredito->dia_vencimento}}
                                    </td>
                                    <td class="project-state">
                                        {{__('R$: ')}}{{$cartaodecredito->limite}}
                                    </td>

                                    <td class="project-state">
                                        {{__('R$: ')}}{{$cartaodecredito->disponivel}}
                                    </td>
                                    <td class="project-actions text-right">

                                        <a class="btn btn-info btn-sm" href="javascript:{}" data-bs-toggle="offcanvas" data-bs-target="#cartaodecreditooffcanvas" aria-controls="cartaodecreditooffcanvas" onclick="editCartaoDeCredito({{$cartaodecredito}})">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Editar
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="javascript:{}" onclick="deleteCartaoDeCreditoo('{{$cartaodecredito->id}}')">
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
<div class="offcanvas offcanvas-end" tabindex="-1" data-bs-scroll="false" data-bs-backdrop="false" id="cartaodecreditooffcanvas" aria-labelledby="cartaodecreditooffcanvasLabel">
    <div class="offcanvas-header bg-gradient-info">
        <h5 class="offcanvas-title" id="cartaodecreditooffcanvasLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form class="form-horizontal">

            <div class="form-group row">
                <label for="descricao" class="col-sm-5 text-right col-form-label">Cartão de Crédito</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Digite os ultimos 4 digitos">
                </div>
            </div>
            <div class="form-group row">
                <label for="dia_fechamento" class="col-sm-5 text-right col-form-label">Dia do Fechamento </label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="dia_fechamento" name="dia_fechamento" placeholder="Dia do Fechamento">
                </div>
            </div>
            <div class="form-group row">
                <label for="dia_vencimento" class="col-sm-5 text-right col-form-label">Dia do Vencimento </label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="dia_vencimento" name="dia_vencimento" placeholder="Dia do Vencimento">
                </div>
            </div>
            <div class="form-group row">
                <label for="limite" class="col-sm-5 text-right col-form-label">Limite </label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="limite" name="limite" placeholder="Limite">
                </div>
            </div>

            <div class="form-group row">
                <label for="disponivel" class="col-sm-5 text-right col-form-label">Disponivel </label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="disponivel" name="disponivel" placeholder="Disponivel" readonly>
                </div>
            </div>

            <input type="hidden" name="id" id="id">
        </form>
    </div>
    <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-app bg-gradient-success save" onclick="saveCartaoDeCredito()">Salvar</button>
        <button type="button" class="btn btn-app bg-gradient-danger delete" style="display:none" onclick="deleteCartaoDeCredito()">Deletar</button>
        <button type="button" class="btn btn-app bg-gradient-info" data-bs-dismiss="offcanvas">Fechar</button>

    </div>

</div>
@endsection

@push('js')
<script>
    $('.table').bootstrapTable({
        onClickRow: function(row, $element) {

        },
        onDblClickRow: function(row, $element, field) {
            var myOffcanvas = document.getElementById('cartaodecreditooffcanvas')
            var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas)
            bsOffcanvas.toggle()
            editCartaoDeCredito(row._data.value);

        }
    });
    $(function() {

        $("#cartaodecreditooffcanvas input[name='limite']").mask('000.000.000.000.000,00', {
            reverse: true
        });
        $("#cartaodecreditooffcanvas input[name='disponivel']").mask('000.000.000.000.000,00', {
            reverse: true
        });
    });

    function createCartaoDeCredito() {
        resetForm();

        $(".delete").css('display', 'none');
        $("#cartaodecreditooffcanvas #cartaodecreditooffcanvasLabel").text('Adicionando Cartão de Crédito');
        $("#cartaodecreditooffcanvas input[name='disponivel']").prop('readonly',true);
    };

    $("#cartaodecreditooffcanvas input[name='limite']").on('keyup', function() {
        $("#cartaodecreditooffcanvas input[name='disponivel']").val($("#cartaodecreditooffcanvas input[name='limite']").val());
    });

    function editCartaoDeCredito(cartaodeCredito) {
        resetForm();

        $(".delete").css('display', 'block');
        $("#cartaodecreditooffcanvas #cartaodecreditooffcanvasLabel").text('Editando Cartão de Crédito');
        $("#cartaodecreditooffcanvas input[name='id']").val(cartaodeCredito.id);
        $("#cartaodecreditooffcanvas input[name='descricao']").val(cartaodeCredito.descricao);
        $("#cartaodecreditooffcanvas input[name='dia_fechamento']").val(cartaodeCredito.dia_fechamento);
        $("#cartaodecreditooffcanvas input[name='dia_vencimento']").val(cartaodeCredito.dia_vencimento);
        $("#cartaodecreditooffcanvas input[name='limite']").val(cartaodeCredito.limite);
        $("#cartaodecreditooffcanvas input[name='disponivel']").val(cartaodeCredito.disponivel);
        $("#cartaodecreditooffcanvas input[name='disponivel']").prop('readonly',false);
    };

    function resetForm() {
        $("#cartaodecreditooffcanvas input[name='id']").val('');
        $("#cartaodecreditooffcanvas input[name='descricao']").val('');
        $("#cartaodecreditooffcanvas input[name='dia_fechamento']").val('');
        $("#cartaodecreditooffcanvas input[name='dia_vencimento']").val('');
        $("#cartaodecreditooffcanvas input[name='limite']").val('');
        $("#cartaodecreditooffcanvas input[name='disponivel']").val('');
    };

    function saveCartaoDeCredito() {

        let id = $("#cartaodecreditooffcanvas input[name='id']").val();
        let descricao = $("#cartaodecreditooffcanvas input[name='descricao']").val();
        let dia_fechamento = $("#cartaodecreditooffcanvas input[name='dia_fechamento']").val();
        let dia_vencimento = $("#cartaodecreditooffcanvas input[name='dia_vencimento']").val();
        let limite = $("#cartaodecreditooffcanvas input[name='limite']").val();
        let disponivel = $("#cartaodecreditooffcanvas input[name='disponivel']").val();

        let Event = {
            descricao: descricao,
            dia_fechamento: dia_fechamento,
            dia_vencimento: dia_vencimento,
            limite: limite,
            disponivel: disponivel,
            tipo:'0'
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
                console.log(responseJson);
                $("#message").html(loadErrors(responseJson));
            }
        });
    }

    function deleteCartaoDeCredito() {

        let id = $("#cartaodecreditooffcanvas input[name='id']").val();
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