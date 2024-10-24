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
                            <button class="btn bg-gradient-info shadow" onclick="createClienteOuFornecedor()" data-bs-toggle="offcanvas" data-bs-target="#ClienteOuFornecedor" aria-controls="ClienteOuFornecedor"><i class="fas fa-plus"></i> Adicionar</button>

                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-body p-0">


                            <table class="table table-fit table-borderless" data-mobile-responsive="true" data-check-on-init="true" data-toggle="table" data-click-to-select="true" data-locale="PT-BR">
                                <thead class="text-start">
                                    <tr>
                                        <th data-field="id" data-width="1" data-width-unit="%" style="width: 1%">
                                            #ID
                                        </th>
                                        <th data-field="nome" data-width="40" data-width-unit="%" style="width: 40%" >
                                            Nome
                                        </th>
                                        <th data-field="pessoa" data-width="10" data-width-unit="%" style="width: 5%">
                                            Pessoa
                                        </th>

                                        <th data-width="30" data-width-unit="%" style="width: 30%">
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="text-start">
                                    @foreach ( $clienteoufornecedor as $key => $clienteoufornecedor )
                                    <tr data-value="{{$clienteoufornecedor}}">
                                        <td>
                                            #{{$clienteoufornecedor->id}}
                                        </td>
                                        <td>
                                            {{$clienteoufornecedor->nome}}
                                        </td>
                                        <td>
                                            {{($clienteoufornecedor->pessoa == 1 ? 'Fisica' : 'Juridica') }}
                                        </td>

                                        <td class="project-actions text-right">

                                            <a class="btn btn-info btn-sm" href="javascript:{}" data-bs-toggle="offcanvas" data-bs-target="#ClienteOuFornecedor" aria-controls="ClienteOuFornecedor" onclick="editClienteOuFornecedor({{$clienteoufornecedor}})">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Editar
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="javascript:{}" onclick="deleteClienteOuFornecedoro('{{$clienteoufornecedor->id}}')">
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
<div class="offcanvas offcanvas-end" tabindex="-1" data-bs-scroll="false" data-bs-backdrop="false" id="ClienteOuFornecedor" aria-labelledby="ClienteOuFornecedorLabel">
    <div class="offcanvas-header bg-gradient-info">
        <h5 class="offcanvas-title" id="ClienteOuFornecedorLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form class="form-horizontal">

            <div class="form-group row">
                <label for="nome" class="col-sm-5 text-right col-form-label">Nome</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o Nome ou Razão social" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="pessoa" class="col-sm-5 text-right col-form-label">Pessoa </label>
                <div class="col-sm-7">
                    <select class="form-control" name="pessoa" id="pessoa" required>
                        <option> Selecione </option>
                        <option value="1">Fisica</option>
                        <option value="2">Juridica</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="cpfcnpj" class="col-sm-5 text-right col-form-label">CPF / CNPJ</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="cpfcnpj" name="cpfcnpj" placeholder="Digite o CPF ou CNPJ" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="telefone" class="col-sm-5 text-right col-form-label">Telefone</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite o Telefone" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="celular" class="col-sm-5 text-right col-form-label">Celular</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="celular" name="celular" placeholder="Digite o Celular " required>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-5 text-right col-form-label">Email</label>
                <div class="col-sm-7">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Digite o Email" required>
                </div>
            </div>
            <div class="form-group row">

                <div class="col-12">

                    <button type="button" class="btn bg-gradient-info shadow float-md-left ml-xl-5 ml-lg-3 px-3" data-bs-toggle="collapse" data-bs-target="#maisinfo" aria-expanded="false" aria-controls="maisinfo">MAIS INFORMAÇÕES</button>
                    <button type="button" class="btn bg-gradient-info shadow float-md-right mr-xl-5 mr-lg-3 px-3" data-bs-toggle="collapse" data-bs-target="#observacoes" aria-expanded="false" aria-controls="observacoes">OBSERVAÇÕES</button>
                </div>

            </div>
            <div class="collapse" id="maisinfo">
                <div class="form-group row">
                    <label for="endereco" class="col-sm-5 text-right col-form-label">Endereço</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Digite o Endereço">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="complemento" class="col-sm-5 text-right col-form-label">Complemento</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Digite um complemento">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bairro" class="col-sm-5 text-right col-form-label">Bairro</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Digite o Bairro">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cidade" class="col-sm-5 text-right col-form-label">Cidade</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Digite a Cidade">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="estado" class="col-sm-5 text-right col-form-label">Estado</label>
                    <div class="col-sm-7">
                        <select class="form-control" id="estado" name="estado">
                            <option>Estados </option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                            <option value="EX">Estrangeiro</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cep" class="col-sm-5 text-right col-form-label">CEP</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="cep" name="cep" placeholder="Digite o CEP">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="site" class="col-sm-5 text-right col-form-label">Site</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="site" name="site" placeholder="Digite o Site">
                    </div>
                </div>
            </div>
            <div class="collapse" id="observacoes">
                <div class="form-group row">
                    <label for="observacoes" class="col-sm-5 text-right col-form-label">Observações</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" id="observacoes" name="observacoes" placeholder="Digite uma descrição"> </textarea>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id" id="id">
        </form>
    </div>
    <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-app bg-gradient-success save" onclick="saveClienteOuFornecedor()">Salvar</button>
        <button type="button" class="btn btn-app bg-gradient-danger delete" style="display:none" onclick="deleteClienteOuFornecedor()">Deletar</button>
        <button type="button" class="btn btn-app bg-gradient-info" data-bs-dismiss="offcanvas">Fechar</button>

    </div>

</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        $("#estado").select2({
            theme: 'bootstrap-5'
        })

    })

    $('.table').bootstrapTable({
        onClickRow: function(row, $element) {

        },
        onDblClickRow: function(row, $element, field) {
            var myOffcanvas = document.getElementById('ClienteOuFornecedor');
            var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas);
            bsOffcanvas.toggle();
            editClienteOuFornecedor(row._data.value);

        }
    });

    function createClienteOuFornecedor() {
        resetForm();

        $(".delete").css('display', 'none');
        $("#ClienteOuFornecedor #ClienteOuFornecedorLabel").text('Adicionando Cliente e Fornecedor')
        $("#situacaoRow").css('display', 'none');
    };



    function editClienteOuFornecedor(clienteoufornecedor) {
        resetForm();
        $("#situacaoRow").css('display', 'flex');
        $(".delete").css('display', 'block');
        $("#ClienteOuFornecedor #ClienteOuFornecedorLabel").text('Editando Cliente e Fornecedor');
        $("#ClienteOuFornecedor input[name='id']").val(clienteoufornecedor.id);
        $("#ClienteOuFornecedor input[name='nome']").val(clienteoufornecedor.nome);
        $("#ClienteOuFornecedor select[name='pessoa']").val(clienteoufornecedor.pessoa);
        $("#ClienteOuFornecedor input[name='cpfcnpj']").val(clienteoufornecedor.cpfcnpj);
        $("#ClienteOuFornecedor input[name='telefone']").val(clienteoufornecedor.telefone);
        $("#ClienteOuFornecedor input[name='celular']").val(clienteoufornecedor.celular);
        $("#ClienteOuFornecedor input[name='email']").val(clienteoufornecedor.email);
        $("#ClienteOuFornecedor input[name='endereco']").val(clienteoufornecedor.endereco);
        $("#ClienteOuFornecedor input[name='complemento']").val(clienteoufornecedor.complemento);
        $("#ClienteOuFornecedor input[name='bairro']").val(clienteoufornecedor.bairro);
        $("#ClienteOuFornecedor input[name='cidade']").val(clienteoufornecedor.cidade);
        $("#ClienteOuFornecedor input[name='estado']").val(clienteoufornecedor.estado);
        $("#ClienteOuFornecedor input[name='cep']").val(clienteoufornecedor.cep);
        $("#ClienteOuFornecedor input[name='site']").val(clienteoufornecedor.site);
        $("#ClienteOuFornecedor textarea[name='observacoes']").val(clienteoufornecedor.observacoes);
    };

    function resetForm() {
        $("#ClienteOuFornecedor input[name='id']").val('');
        $("#ClienteOuFornecedor input[name='nome']").val('');
        $("#ClienteOuFornecedor select[name='pessoa']").val('');
        $("#ClienteOuFornecedor input[name='cpfcnpj']").val('');
        $("#ClienteOuFornecedor input[name='telefone']").val('');
        $("#ClienteOuFornecedor input[name='celular']").val('');
        $("#ClienteOuFornecedor input[name='email']").val('');
        $("#ClienteOuFornecedor input[name='endereco']").val('');
        $("#ClienteOuFornecedor input[name='complemento']").val('');
        $("#ClienteOuFornecedor input[name='bairro']").val('');
        $("#ClienteOuFornecedor input[name='cidade']").val('');
        $("#ClienteOuFornecedor input[name='estado']").val('');
        $("#ClienteOuFornecedor input[name='cep']").val('');
        $("#ClienteOuFornecedor input[name='site']").val('');
        $("#ClienteOuFornecedor textarea[name='observacoes']").val('');
    };

    function saveClienteOuFornecedor() {

        let id = $("#ClienteOuFornecedor input[name='id']").val();
        let nome = $("#ClienteOuFornecedor input[name='nome']").val();
        let pessoa = $("#ClienteOuFornecedor select[name='pessoa']").find(':selected').val();
        let cpfcnpj = $("#ClienteOuFornecedor input[name='cpfcnpj']").val();
        let telefone = $("#ClienteOuFornecedor input[name='telefone']").val();
        let celular = $("#ClienteOuFornecedor input[name='celular']").val();
        let email = $("#ClienteOuFornecedor input[name='email']").val();
        let endereco = $("#ClienteOuFornecedor input[name='endereco']").val();
        let complemento = $("#ClienteOuFornecedor input[name='complemento']").val();
        let bairro = $("#ClienteOuFornecedor input[name='bairro']").val();
        let cidade = $("#ClienteOuFornecedor input[name='cidade']").val();
        let estado = $("#ClienteOuFornecedor input[name='estado']").val();
        let cep = $("#ClienteOuFornecedor input[name='cep']").val();
        let site = $("#ClienteOuFornecedor input[name='site']").val();
        let observacoes = $("#ClienteOuFornecedor textarea[name='observacoes']").val();
        let Event = {
            nome: nome,
            pessoa: pessoa,
            cpfcnpj: cpfcnpj,
            telefone: telefone,
            celular: celular,
            email: email,
            endereco: endereco,
            complemento: complemento,
            bairro: bairro,
            cidade: cidade,
            estado: estado,
            cep: cep,
            site: site,
            observacoes: observacoes
        }

        let route;
        if (id == '') {
            route = '{{route("clienteoufornecedor.store")}}';
            Event._method = 'POST';
        } else {
            route = '{{route("clienteoufornecedor.update")}}';
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

    function deleteClienteOuFornecedor() {

        let id = $("#ClienteOuFornecedor input[name='id']").val();
        let Event = {
            _method: 'DELETE',
            id: id
        };
        let route = '{{route("clienteoufornecedor.delete")}}'

        sendEvent(route, Event)
    };


    function deleteClienteOuFornecedoro(id) {
        let Event = {
            _method: 'DELETE',
            id: id
        };
        let route = '{{route("clienteoufornecedor.delete")}}'

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