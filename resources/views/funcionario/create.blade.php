@extends('layouts.app')

@section('content')
<style>
    label {
        font-size: 15px;
    }

    input {
        text-transform: uppercase;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content pt-2">
        <div class="container-fluid">
            <form id="criar-funcionario" action="{{ route('funcionario.store') }}" method="post">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-md-12 text-end">
                        <a class="btn btn-app bg-gradient-success" href="javascript:{}" onclick="document.getElementById('criar-funcionario').submit();">
                            <i class="fas fa-save"></i> Salvar
                        </a>
                        <a class="btn btn-app bg-gradient-danger" href="{{route('funcionario.index')}}">
                            <i class="fas fa-times"></i> Cancelar
                        </a>
                    </div>
                </div>
                <div class="row">
                    <!-- Identificação -->
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Dados Pessoais</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: block;">
                                <div class="row">
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="nome">Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Completo" required>
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="nascimento">Data de Nascimento</label>
                                        <div class="input-group date" id="nascimento">

                                            <input class="form-control date" name="nascimento" placeholder="DD/MM/YYYY" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text"><i data-feather="calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="nacionalidade"> Nacionalidade<span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="nacionalidade" name="nacionalidade" placeholder="Nacionalidade">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="rg"> RG <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="rg" name="rg" placeholder="RG">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="cpf"> CPF <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="sexo"> Sexo <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="sexo" name="sexo" placeholder="Sexo">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="deficiencia"> Deficiencia <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="deficiencia" name="deficiencia" placeholder="Deficiencia">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="tel_fixo"> Telefone Fixo <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="tel_fixo" name="tel_fixo" placeholder="Telefone Fixo">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="tel_celular1"> Celular 1 <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="tel_celular1" name="tel_celular1" placeholder="Celular 1">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="tel_celular2"> Celular 2 <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="tel_celular2" name="tel_celular2" placeholder="Celular 2">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="estadocivil"> Estado Civil <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <select class="form-select estadocivil" name="estadocivil">
                                            <option>Selecione</option>
                                            <option value="Solteiro">Solteiro</option>
                                            <option value="Casado">Casado</option>
                                            <option value="Separado">Separado</option>
                                            <option value="Divorciado">Divorciado</option>
                                            <option value="Viuvo">Viúvo</option>
                                        </select>
                                    </div>


                                    <div class="form-group col-md-12 col-lg-6 conjuge_dados">
                                        <label for="conjuge"> Nome do Conjuge <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="conjuge" name="conjuge" placeholder="Nome do Conjuge">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6 conjuge_dados">
                                        <label for="conjuge_tel"> Conjuge Telefone <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="conjuge_tel" name="conjuge_tel" placeholder="Conjuge Telefone">
                                    </div>

                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="filhos"> Numero de filhos <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="filhos" name="filhos" placeholder="Numero de Filhos">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="nome_mae"> Nome da Mãe <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="nome_mae" name="nome_mae" placeholder="Nome da Mãe">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="nome_pai"> Nome do Pai <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="nome_pai" name="nome_pai" placeholder="Nome do Pai">
                                    </div>


                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="tituloeleitor"> Titulo de Eleitor <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="tituloeleitor" name="tituloeleitor" placeholder="Titulo de Eleitor">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="tituloeleitor_secao"> Seção <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="tituloeleitor_secao" name="tituloeleitor_secao" placeholder="Titulo de Eleitor: Seção">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="tituloeleitor_zonaeleitoral">Zona Eleitoral <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="tituloeleitor_zonaeleitoral" name="tituloeleitor_zonaeleitoral" placeholder="Titulo de Eleitor: Zona Eleitoral">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="grau_instrucao"> Grau Instrução <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="grau_instrucao" name="grau_instrucao" placeholder="Grau Instrução">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="formacao"> Formação Acadêmica <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="formacao" name="formacao" placeholder="Formação Acadêmica">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="passaporte_numero"> Passaporte <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="passaporte_numero" name="passaporte_numero" placeholder="Passaporte">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Endereço -->
                    <div class=" col-xl-4 col-lg-6 col-md-6">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Endereço</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: block;">


                                <div class="row">
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="cep"> CEP <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="endereco">Logradouro <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Logradouro">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="estado"> Estado <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="municipio"> Cidade <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="municipio" name="municipio" placeholder="Cidade">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Financeiro</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: block;">


                                <div class="row">
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="forma_pagamento"> Forma de Pagamento <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="forma_pagamento" name="forma_pagamento" placeholder="Forma de Pagamento">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="data_salario">Data de Pagamento</label>
                                        <div class="input-group date" id="data_pgamento">

                                            <input class="form-control date" name="data_salario" placeholder="DD/MM/YYYY" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text"><i data-feather="calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="banco">Banco <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="banco" name="banco" placeholder="Banco">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="agencia"> Agencia <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="agencia" name="agencia" placeholder="Agencia">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="operacao"> Operação <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="operacao" name="operacao" placeholder="Operação">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="conta"> Conta <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="conta" name="conta" placeholder="Conta">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- funcionario -->
                    <div class=" col-xl-4 col-lg-6 col-md-6">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Carteira de Trabalho</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: block;">


                                <div class="row">
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="data_admissao">Data de Admissão <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <div class="input-group date" id="data_admissao">

                                            <input class="form-control date" name="data_admissao" placeholder="DD/MM/YYYY">
                                            <div class="input-group-append">
                                                <div class="input-group-text"><i data-feather="calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="data_demissao">Data de Demissão <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <div class="input-group date" id="data_demissao">

                                            <input class="form-control date" name="data_demissao" placeholder="DD/MM/YYYY">
                                            <div class="input-group-append">
                                                <div class="input-group-text"><i data-feather="calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="pis_nis">PIS/NIS <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="pis_nis" name="pis_nis" placeholder="PIS/NIS">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="carteiradetrabalho_numero">Carteira de Trabalho <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="carteiradetrabalho_numero" name="carteiradetrabalho_numero" placeholder="Carteira de Trabalho">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="carteiradetrabalho_serie">Carteira de Trabalho: Série <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="carteiradetrabalho_serie" name="carteiradetrabalho_serie" placeholder="Carteira de Trabalho: Série">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="carteiradetrabalho_emissao">Carteira de Trabalho: Emissão <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <div class="input-group date" id="carteiradetrabalho_emissao">

                                            <input class="form-control date" name="carteiradetrabalho_emissao" placeholder="DD/MM/YYYY">
                                            <div class="input-group-append">
                                                <div class="input-group-text"><i data-feather="calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="carteiradetrabalho_uf">Carteira de Trabalho: UF <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="carteiradetrabalho_uf" name="carteiradetrabalho_uf" placeholder="Carteira de Trabalho: UF">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="cargo">Função/Setor <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Função/Setor">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="salario_inicial">Salario Inicial <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="salario_inicial" name="salario_inicial" placeholder="Salario Inicial">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="salario_atual">Salario Atual <span class="float-end" style="color:grey; font-size:9px; font-weight: 100;">(Opcional)</span></label>
                                        <input type="text" class="form-control" id="salario_atual" name="salario_atual" placeholder="Salario Atual">
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
        if ($(".estadocivil option:selected").val() != "Casado") {
            $(".conjuge_dados").css('display', 'none');
        } else {
            $(".conjuge_dados").css('display', 'block');
        };
        if (/Mobi/.test(navigator.userAgent)) {
            // if mobile device, use native pickers
            $(".date input").attr("type", "date");
            $(".time input").attr("type", "time");
        } else {
            // if desktop device, use DateTimePicker
            $(".date").datetimepicker({
                format: "DD-MM-YYYY",
                locale: 'pt-BR',
                icons: {
                    next: "fa fa-chevron-right",
                    previous: "fa fa-chevron-left",
                }
            });

        }

        $('.estadocivil').on('change', function() {
            if ($(".estadocivil option:selected").val() != "Casado") {
                $(".conjuge_dados").css('display', 'none');
            } else {
                $(".conjuge_dados").css('display', 'block');
            };
        });

        $("#cep").mask('00000-000');
        $("#cpf").mask('000.000.000-00', {
            reverse: true
        });
        $("#rg").mask('00.000.000-0', {
            reverse: true
        });

        $("#tel_fixo").mask('(00) 0000-0000');
        $("#tel_celular1").mask('(00) 00000-0000');
        $("#tel_celular2").mask('(00) 00000-0000');
        $("#salario_atual").mask('000.000.000.000.000,00', {
            reverse: true
        });
        $("#salario_inicial").mask('000.000.000.000.000,00', {
            reverse: true
        });
    });

    $("#cep").on('keyup', function() {
        if ($("#cep").val().length == 9) {
        var cep = $("#cep").val().replace(/-/g, "");
            PesquisarCEP(cep);
        };
        
    });


    function PesquisarCEP(cep_informado) {
        var resultado;
        $.ajax({
            type: "GET",
            url: "https://brasilapi.com.br/api/cep/v1/" + cep_informado,
            dataType: "json",
            error: function() {
                alert('Houve um problema de comunicacao');
            }
        }).done(function(dados) {
        console.log(dados)
            $("#endereco").val(dados.street)
            $("#estado").val(dados.state)
            $("#municipio").val(dados.city)
        });
    }
</script>
@endpush