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
<div class="content-wrapper bg-white">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 pt-2 pr-4 pt-5 pb-2">
                            <button class="btn bg-gradient-info shadow" onclick="createFuncionario()"><i class="fas fa-plus"></i> Adicionar</button>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-body p-0">
                            <table class="table table-fit table-borderless" data-mobile-responsive="true" data-check-on-init="true" data-toggle="table" data-click-to-select="true" data-locale="PT-BR">
                                <thead>
                                    <tr class="text-center">
                                        <th data-radio="true" data-visible="false" data-width="0" data-width-unit="%"></th>
                                        <th data-field="id" data-width="1" data-width-unit="%">Ficha</th>
                                        <th data-field="nome" data-width="10" data-width-unit="%">Nome</th>
                                        <th data-field="nascimento" data-width="5" data-width-unit="%">Nascimento</th>
                                        <th data-field="cpf" data-width="10" data-width-unit="%">CPF</th>
                                        <th data-field="rg" data-width="6" data-width-unit="%">RG</th>
                                        <th data-field="salario_atual" data-width="10" data-width-unit="%">Salario Atual</th>
                                        <th data-width="20" data-width-unit="%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $funcionarios as $funcionario)
                                    <tr class="text-center">
                                        <td></td>
                                        <td>{{$funcionario->id}}</td>
                                        <td>{{$funcionario->nome}}</td>
                                        <td>{{$funcionario->nascimento->format('d/m/Y')}}</td>
                                        <td>{{$funcionario->cpf}}</td>
                                        <td>{{$funcionario->rg}}</td>
                                        <td>R$: {{$funcionario->salario_atual}}</td>
                                        <td class="project-actions text-right">

                                            <a class="btn btn-info btn-sm" href="javascript:{}" onclick="editFuncionario({{$funcionario}})">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Editar
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="javascript:{}" onclick="deleteFuncionario('{{$funcionario->id}}')">
                                                <i class="fas fa-trash">
                                                </i>
                                                Apagar
                                            </a>
                                            <form action="{{ route('funcionario.destroy', $funcionario->id)}}" method="post" id={{$funcionario->id}}>
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
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
@endsection

@push('js')
<script>
    $('.table').bootstrapTable({
        onClickRow: function(row, $element) {
            console.log(row);
        },
        onDblClickRow: function(row, $element, field) {
            window.location.href = "{{route('funcionario.index')}}/" + row.id + "/edit";
        },
        onSearch: function(text) {

        }
    });

    function createFuncionario() {
        window.location.href = "{{route('funcionario.create')}}/"
    };

    function editFuncionario(Funcionario) {
        window.location.href = "{{route('funcionario.index')}}/" + Funcionario.id + "/edit";
    };

    function deleteFuncionario(id){
        deletar(id)
    }

    function deletar(id) {
        document.getElementById(id).submit();
    }
</script>
@endpush