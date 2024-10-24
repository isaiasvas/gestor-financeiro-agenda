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

                <div class="col-xl-6">
                    <div class="pt-5 pb-2">
                        <div id="button-monitor">
                            <button class="btn bg-gradient-info shadow" onclick="createCategory()" data-bs-toggle="offcanvas" data-bs-target="#Categoryoffcanvas" aria-controls="Categoryoffcanvas"><i class="fas fa-plus"></i> Adicionar</button>
                        </div>
                    </div>
                    <div class="card shadow">

                        <!-- /.card-header -->
                        <div class="card-body p-0">

                            <table class="table align-middle ">
                                <thead class="text-center">
                                    <tr>
                                        <th style="width: 1%">
                                            #
                                        </th>
                                        <th style="width: 30%">
                                            Descrição
                                        </th>
                                        <th style="width: 20%">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-center p-0 m-0">
                                    @foreach ( $categorias as $key => $category )
                                    <tr class="bg-light">
                                        <td>
                                            #
                                        </td>
                                        <td class="text-start">
                                            {{$key+1}}.&nbsp;{{ $category->categoria }}
                                        </td>

                                        <td class="project-actions text-right">
                                            <a class="btn btn-info btn-sm" href="#" data-bs-toggle="offcanvas" data-bs-target="#Categoryoffcanvas" aria-controls="Categoryoffcanvas" onClick="editCategory('{{$category}}')">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Editar
                                            </a>
                                            <a class="btn btn-danger btn-sm" onClick="deleteCategoryy('{{$category->id}}')" href="#">
                                                <i class="fas fa-trash">
                                                </i>
                                                Apagar
                                            </a>
                                        </td>
                                    </tr>
                                    @foreach ( $category->children as $childkey => $subCategory )
                                    <tr>
                                        <td>
                                            #
                                        </td>
                                        <td class="text-start">
                                            <div class="d-flex">
                                                <div>
                                                    <img src="{{asset('brand/N1.png')}}" class="p-0 m-0 ml-1 pr-2">
                                                </div>
                                                <div>
                                                    {{$key+1}}.{{$childkey+1}}&nbsp;{{ $subCategory->categoria }}
                                                </div>

                                            </div>
                                        </td>

                                        <td class="project-actions text-right">

                                            <a class="btn btn-info btn-sm" data-bs-toggle="offcanvas" data-bs-target="#Categoryoffcanvas" aria-controls="Categoryoffcanvas" onClick="editCategory('{{$subCategory}}')" href="#">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Editar
                                            </a>
                                            <a class="btn btn-danger btn-sm" onClick="deleteCategoryy('{{$subCategory->id}}')" href="#">
                                                <i class="fas fa-trash">
                                                </i>
                                                Apagar
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" data-bs-scroll="false" data-bs-backdrop="false" id="Categoryoffcanvas" aria-labelledby="CategoryoffcanvasLabel">
    <div class="offcanvas-header bg-gradient-info">
        <h5 class="offcanvas-title" id="CategoryoffcanvasLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form class="form-horizontal">

            <div class="form-group row">
                <div id="message"></div>
                <label for="categoria_id" class="col-sm-6 text-right col-form-label">Categoria pai</label>
                <div class="col-sm-6">
                    <select class="form-control" name="categoria_id">
                        <option value=""> </option>
                        @foreach ( $categorias as $key => $category )
                        <option value="{{$category->id}}">{{$key+1}}&nbsp;{{ $category->categoria }}</option>

                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="categoria" class="col-sm-6 text-right col-form-label">Categoria</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Categoria">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">

                    <button class="btn btn-sm bg-gradient-info" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        PADRÕES PARA LANÇAMENTO
                    </button>
                </div>
            </div>
            <div class="collapse" id="collapseExample">
                <div class="form-group row">
                    <label for="tipolancamento" class="col-sm-6 text-right col-form-label">Tipo de Lançamento</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="tipolancamento">
                            <option value="1"> Receita </option>
                            <option value="2"> Despesa </option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="descricao" class="col-sm-6 text-right col-form-label">Descrição</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bancooucartao" class="col-sm-6 text-right col-form-label">Conta bancária ou Cartão</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="bancooucartao" name="bancooucartao" placeholder="Conta bancária ou Cartão">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="formapagamento" class="col-sm-6 text-right col-form-label">Forma de Pagamento</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="formapagamento" name="formapagamento" placeholder="Forma de Pagamento">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="clienteefornecedor" class="col-sm-6 text-right col-form-label">Cliente e Fornecedor</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="clienteefornecedor" name="clienteefornecedor" placeholder="Cliente e Fornecedor">
                    </div>
                </div>
                <input type="hidden" name="id" id="id">
            </div>
        </form>
    </div>
    <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-app bg-gradient-success save" onclick="saveCategory()">Salvar</button>
        <button type="button" class="btn btn-app bg-gradient-danger delete" style="display:none" onclick="deleteCategory()">Deletar</button>
        <button type="button" class="btn btn-app bg-gradient-info" data-bs-dismiss="modal">Fechar</button>

    </div>

</div>

@endsection

@push('js')
<script>
    function editCategory(categoria) {

        var obj = jQuery.parseJSON(categoria)
        $(".delete").css('display', 'block');
        $("#Categoryoffcanvas #CategoryoffcanvasLabel").text('Editando Categoria')
        $("#Categoryoffcanvas input[name='id']").val(obj.id);
        $("#Categoryoffcanvas select[name='categoria_id']").val(obj.categoria_id);
        $("#Categoryoffcanvas input[name='categoria']").val(obj.categoria);
        $("#Categoryoffcanvas select[name='tipolancamento']").val(obj.tipolancamento);
        $("#Categoryoffcanvas input[name='descricao']").val(obj.descricao);
        $("#Categoryoffcanvas input[name='bancooucartao']").val(obj.bancooucartao);
        $("#Categoryoffcanvas input[name='formapagamento']").val(obj.formapagamento);
        $("#Categoryoffcanvas input[name='clienteefornecedor']").val(obj.clienteefornecedor);
    }

    function createCategory() {
        resetForm();

        $(".delete").css('display', 'none');
        $("#Categoryoffcanvas #CategoryoffcanvasLabel").text('Criando Categoria')
    }

    function resetForm() {
        $("#Categoryoffcanvas input[name='id']").val('');
        $("#Categoryoffcanvas select[name='categoria_id']").val('');
        $("#Categoryoffcanvas input[name='categoria']").val('');
        $("#Categoryoffcanvas select[name='tipolancamento']").val('');
        $("#Categoryoffcanvas input[name='descricao']").val('');
        $("#Categoryoffcanvas input[name='bancooucartao']").val('');
        $("#Categoryoffcanvas input[name='formapagamento']").val('');
        $("#Categoryoffcanvas input[name='clienteefornecedor']").val('');
    }

    function saveCategory() {
        let id = $("#Categoryoffcanvas input[name='id']").val();
        let categoria_id = $("#Categoryoffcanvas select[name='categoria_id']").val();
        let categoria = $("#Categoryoffcanvas input[name='categoria']").val();
        let tipolancamento = $("#Categoryoffcanvas select[name='tipolancamento']").val();
        let descricao = $("#Categoryoffcanvas input[name='descricao']").val();
        let bancooucartao = $("#Categoryoffcanvas input[name='bancooucartao']").val();
        let formapagamento = $("#Categoryoffcanvas input[name='formapagamento']").val();
        let clienteefornecedor = $("#Categoryoffcanvas input[name='clienteefornecedor']").val();

        let Event = {
            categoria_id: categoria_id,
            categoria: categoria,
            tipolancamento: tipolancamento,
            descricao: descricao,
            bancooucartao: bancooucartao,
            formapagamento: formapagamento,
            clienteefornecedor: clienteefornecedor,
        }

        let route;
        if (id == '') {
            route = '{{route("categoria.store")}}';
            Event._method = 'POST';
        } else {
            route = '{{route("categoria.update")}}';
            Event.id = id;
            Event._method = 'PUT';
        }
        sendEvent(route, Event);
    };

    function deleteCategory() {

        let id = $("#Categoryoffcanvas input[name='id']").val();
        let Event = {
            _method: 'DELETE',
            id: id
        };
        let route = '{{route("categoria.delete")}}'

        sendEvent(route, Event)
    };


    function deleteCategoryy(id) {
        let Event = {
            _method: 'DELETE',
            id: id
        };
        let route = '{{route("categoria.delete")}}'

        sendEvent(route, Event)
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