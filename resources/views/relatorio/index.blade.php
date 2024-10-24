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
                            <div class="card">
                                <div class="card-header">
                                    Contas
                                </div>
                                <div class="card-body">
                                    contas body
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    Contas
                                </div>
                                <div class="card-body">
                                    contas body
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    Contas
                                </div>
                                <div class="card-body">
                                    contas body
                                </div>
                            </div>
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
</script>
@endpush