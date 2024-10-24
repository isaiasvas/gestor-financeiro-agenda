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
                            <button class="btn bg-gradient-info shadow" onclick="createFormasDePagamento()" data-bs-toggle="offcanvas" data-bs-target="#FormasDePagamento" aria-controls="FormasDePagamento"><i class="fas fa-plus"></i> Adicionar</button>

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
                                        <th data-field="sigla" data-width="10" data-width-unit="%" style="width: 5%">
                                            Sigla
                                        </th>
                                        <th data-field="descricao" data-width="10" data-width-unit="%" style="width: 5%">
                                            Descricao
                                        </th>
                                        
                                        <th data-width="30" data-width-unit="%" style="width: 30%">
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="text-center">
                                    @foreach ( $formasdepagamento as $key => $formapgto )
                                    <tr data-value="{{$formapgto}}">
                                        <td>
                                            #{{$formapgto->id}}
                                        </td>
                                        <td>
                                            {{$formapgto->sigla}}
                                        </td>
                                        <td>
                                            {{$formapgto->descricao}}
                                        </td>
                                
                                        <td class="project-actions text-right">

                                            <a class="btn btn-info btn-sm" href="javascript:{}" data-bs-toggle="offcanvas" data-bs-target="#FormasDePagamento" aria-controls="FormasDePagamento" onclick="editFormasDePagamento({{$formapgto}})">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Editar
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="javascript:{}" onclick="deleteFormasDePagamentoo('{{$formapgto->id}}')">
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
<div class="offcanvas offcanvas-end" tabindex="-1" data-bs-scroll="false" data-bs-backdrop="false" id="FormasDePagamento" aria-labelledby="FormasDePagamentoLabel">
    <div class="offcanvas-header bg-gradient-info">
        <h5 class="offcanvas-title" id="FormasDePagamentoLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form class="form-horizontal">

            <div class="form-group row">
                <label for="descricao" class="col-sm-5 text-right col-form-label">Descricao</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Digite uma descrição">
                </div>
            </div>
            <div class="form-group row">
                <label for="sigla" class="col-sm-5 text-right col-form-label">Sigla </label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="sigla" name="sigla" placeholder="Digite a sigla">
                </div>
            </div>



            <input type="hidden" name="id" id="id">
        </form>
    </div>
    <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-app bg-gradient-success save" onclick="saveFormasDePagamento()">Salvar</button>
        <button type="button" class="btn btn-app bg-gradient-danger delete" style="display:none" onclick="deleteFormasDePagamento()">Deletar</button>
        <button type="button" class="btn btn-app bg-gradient-info" data-bs-dismiss="offcanvas">Fechar</button>

    </div>

</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {


    })

    $('.table').bootstrapTable({
        onClickRow: function(row, $element) {

        },
        onDblClickRow: function(row, $element, field) {
            var myOffcanvas = document.getElementById('FormasDePagamento');
            var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas);
            bsOffcanvas.toggle();
            editFormasDePagamento(row._data.value);

        }
    });

    function createFormasDePagamento() {
        resetForm();

        $(".delete").css('display', 'none');
        $("#FormasDePagamento #FormasDePagamentoLabel").text('Adicionando Forma de Pagamento')
        $("#situacaoRow").css('display', 'none');
    };



    function editFormasDePagamento(formadePagamento) {
        resetForm();
        $("#situacaoRow").css('display', 'flex');
        $(".delete").css('display', 'block');
        $("#FormasDePagamento #FormasDePagamentoLabel").text('Editando Forma de Pagamento');
        $("#FormasDePagamento input[name='id']").val(formadePagamento.id);
        $("#FormasDePagamento input[name='descricao']").val(formadePagamento.descricao);
        $("#FormasDePagamento input[name='sigla']").val(formadePagamento.sigla);
    };

    function resetForm() {
        $("#FormasDePagamento input[name='id']").val('');
        $("#FormasDePagamento input[name='descricao']").val('');
        $("#FormasDePagamento input[name='sigla']").val('');

    };

    function saveFormasDePagamento() {

        let id = $("#FormasDePagamento input[name='id']").val();
        let sigla = $("#FormasDePagamento input[name='sigla']").val();
        let descricao = $("#FormasDePagamento input[name='descricao']").val();
      
        let Event = {
            sigla: sigla,
            descricao: descricao,
        }

        let route;
        if (id == '') {
            route = '{{route("formasdepagamento.store")}}';
            Event._method = 'POST';
        } else {
            route = '{{route("formasdepagamento.update")}}';
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

    function deleteFormasDePagamento() {

        let id = $("#FormasDePagamento input[name='id']").val();
        let Event = {
            _method: 'DELETE',
            id: id
        };
        let route = '{{route("formasdepagamento.delete")}}'

        sendEvent(route, Event)
    };


    function deleteFormasDePagamentoo(id) {
        let Event = {
            _method: 'DELETE',
            id: id
        };
        let route = '{{route("formasdepagamento.delete")}}'

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