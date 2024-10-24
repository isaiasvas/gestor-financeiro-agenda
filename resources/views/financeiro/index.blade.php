@extends('layouts.app')
<style>
    .width-col {
        white-space: nowrap;
        width: 1%;
    }

    table thead {
        background-image: linear-gradient(#ffffff, #EDEDED);
    }

    .table-hover tbody tr:hover td,
    .table-hover tbody tr:hover th {
        background: #fffdd5;
    }

    table tfoot {
        background: #fffdd5;
    }
</style>
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper bg-body">
        <section class="content pt-3">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="pt-md-5">
                            <div id="button-monitor">
                                <button class="btn bg-gradient-info" id="novo"><i class="fas fa-plus"></i>
                                    Adicionar</button>
                            </div>

                            <div class="toolbar ">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="btn-group year">
                                            <button class="btn btn-default bg-gradient-info" id="left-year"> <i
                                                    class="fas fa-chevron-left"></i> </button>
                                            <button class="btn btn-default" id="year-value"> {{ now()->year }} </button>
                                            <button class="btn btn-default  bg-gradient-info" id="right-year"> <i
                                                    class="fas fa-chevron-right"></i> </button>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="d-none d-md-block">
                                            <div class="btn-group month">
                                                <button class="btn btn-default bg-gradient-info" id="left-month"> <i
                                                        class="fas fa-chevron-left"></i> </button>
                                                <button class="btn btn-default ">JAN</button>
                                                <button class="btn btn-default ">FEV</button>
                                                <button class="btn btn-default ">MAR</button>
                                                <button class="btn btn-default ">ABR</button>
                                                <button class="btn btn-default ">MAI</button>
                                                <button class="btn btn-default ">JUN</button>
                                                <button class="btn btn-default ">JUL</button>
                                                <button class="btn btn-default ">AGO</button>
                                                <button class="btn btn-default ">SET</button>
                                                <button class="btn btn-default ">OUT</button>
                                                <button class="btn btn-default ">NOV</button>
                                                <button class="btn btn-default ">DEZ</button>
                                                <button class="btn btn-default bg-gradient-info" id="right-month"> <i
                                                        class="fas fa-chevron-right"></i> </button>
                                            </div>
                                        </div>

                                        <div class="d-block d-md-none">
                                            <div class="btn-group month">
                                                <button class="btn btn-default bg-gradient-info" id="left-month"> <i
                                                        class="fas fa-chevron-left"></i> </button>
                                                <button class="btn btn-default " id="mobileMonth">JAN</button>
                                                <button class="btn btn-default bg-gradient-info" id="right-month"> <i
                                                        class="fas fa-chevron-right"></i> </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <table class="table table-fit table-borderless " data-sort-name="vencimento"
                                data-sort-order="asc" data-check-on-init="true" data-show-footer="true"
                                data-mobile-responsive="true" data-toggle="table" data-toolbar=".toolbar"
                                data-toolbar-align="left" data-click-to-select="true" data-locale="PT-BR">
                                <thead>
                                    <tr>
                                        <th data-field="id" data-visible="false"> </th>
                                        <th data-field="vencimento" class="width-col"
                                            data-footer-formatter="TotalFormatter">Data</th>
                                        <th data-field="descricao" data-width="100" data-width-unit="%">Descrição</th>
                                        <th data-field="valor" class="width-col" data-footer-formatter="ValorFormatter">
                                            Valor</th>
                                        <th data-visible="false" data-field="tipolancamento"></th>
                                        <th data-field="pago" data-Formatter="pagoFormatter"></th>
                                        <th data-field="pagarbutton"></th>
                                        <th data-field="button"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="saldo-anterior" style="background:#fffdd5">
                                        <td data-visible="false"> 0 </td>
                                        <td> </td>
                                        <td id="label-saldo-anterior"
                                            style="font-weight: bold; color:#2d7e1f;text-transform: uppercase; "> SALDO
                                            ANTERIOR</td>
                                        <td id="saldo-anterior" data-value="0" data-label="Saldo Anterior:">R$ 00,00 </td>
                                        <td data-visible="false"> 1 </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    @foreach ($contas as $conta)
                                        <tr>
                                            <td style="font-size:0px">{{ $conta->id }}</td>
                                            <td data-label="Vencimento:"
                                                class="width-col {{ $conta->tipolancamento == 1 ? 'text-success' : 'text-danger' }}"
                                                id="vencimento">
                                                {{ \Carbon\Carbon::parse($conta->vencimento)->format('d-m-Y') }}</td>
                                            <td data-label="Descrição:"
                                                class="{{ $conta->tipolancamento == 1 ? 'text-success' : 'text-danger' }} text-truncate"
                                                id="descricao">{{ $conta->descricao }}</td>
                                            <td data-label="Valor:"
                                                class="width-col {{ $conta->tipolancamento == 1 ? 'text-success' : 'text-danger' }}"
                                                data-value="{{ $conta->valor }}" id="valorFormatado">R$
                                                {{ number_format($conta->valor, 2, ',', '.') }}</td>
                                            <td data-visible="false"> {{ $conta->tipolancamento }} </td>
                                            <td data-label="Status" id="pago" data-value="{{ $conta->pago }}">

                                            </td>
                                            <td data-label="Pagar"> <a href="#"
                                                    onclick="pagarConta('{{ $conta->id }}')"> <i
                                                        class="fas fa-check {{ $conta->pago ? 'text-success' : 'text-muted' }}"></i></a>
                                            </td>
                                            <td> <button class="btn btn-sm bg-gradient-warning"
                                                    onclick="editar('{{ $conta->id }}')"><i
                                                        class="fas fa-pen"></i></button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                            <div class="d-block d-md-none " style="margin-top:-5em; padding-bottom:4em;z-index:99">
                                <div class=" row px-4">
                                    <div class="col-4">
                                        <span class="lead">Total</span>
                                    </div>
                                    <div class="col-8 text-right">
                                        <span class="lead" id="totalMobile"> </span>
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
        var $id = null;

        function TotalFormatter() {
            return 'Total'
        }

        function pagoFormatter(value, row) {
            var pago = row._pago_data.value ? "text-success" : "";
            var title = row._pago_data.value ? "Pago" : "";
            var vencimento;
            if (pago != 'text-success') {
                vencimento = moment(row.vencimento, 'DD/MM/YYYY');
                if (vencimento.isSameOrBefore(moment())) {
                    pago = 'text-danger';
                    title = 'Vencido';
                } else {
                    pago = 'text-warning';
                    title = 'A Vencer'
                }
            }
            return row.id > 0 ? "<i class='fas fa-circle " + pago + "' title='" + title + "'> </i>" : ""
        }

        function pagarConta(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            var appUrl = "{{ config('app.url') }}";
            $.ajax({
                type: 'PUT',
                url: appUrl + "/financeiro/" + id, // Usando a variável appUrl
                data: {
                    _method: 'PUT',
                    pago: 1,
                    retorno: 1,
                },
                dataType: 'json',
                success: function() {
                    setInterval('location.reload()', 0500);
                },
                error: function(data) {
                    console.log(data);
                }
            });

        }

        $('.table').bootstrapTable({
            onClickRow: function(row, $element) {
                if (row.id != 0) {
                    $id = row.id;
                }
            },
            onDblClickRow: function(row, $element, field) {
                if (row.id != 0) {
                    window.location.href = "{{ route('financeiro.index') }}/" + row.id + "/edit";
                }
            },
            onSearch: function(text) {}
        });

        function editar(id) {
            if (id != 0) {
                window.location.href = "{{ route('financeiro.index') }}/" + id + "/edit"
            }
        }

        $("#replicar").on('click', function() {
            if ($id != null) {
                window.location.href = "{{ route('financeiro.index') }}/" + $id + "/replica";
            }
        })

        $("#novo").on('click', function() {
            window.location.href = "{{ route('financeiro.create') }}"
        })

        function resetTable() {
            var all = [];
            for (let i = 0; i <= "{{ $lastid }}"; i++) {
                all.push(i.toString());
            }
            $(".table").bootstrapTable('filterBy', {
                id: all
            });
        }

        function changeMonthOrYear(month, year) {
            resetTable();
            Saldos(month, year);
            a = [];
            var obj = JSON.parse(JSON.stringify($(".table").bootstrapTable('getData')))
            a.push('0');
            var sum = obj[0]._valor_data.value;
            for (var key in obj) {
                var mes = moment(obj[key].vencimento, 'DD-MM-YYYY').format('MM');
                var ano = moment(obj[key].vencimento, 'DD-MM-YYYY').format('YYYY');
                if ((mes == month) && (ano == year)) {
                    a.push(obj[key].id.toString());

                    if (obj[key].tipolancamento == '1') {
                        sum += obj[key]._valor_data.value;
                    } else {
                        sum -= obj[key]._valor_data.value;
                    }
                }
            }
            $(".table").bootstrapTable('filterBy', {
                id: a
            });

            $("#totalMobile").text(sum.toLocaleString("pt-BR", {
                style: "currency",
                currency: "BRL"
            }).replace('-R$', 'R$ -'));


        }

        function Saldos(month, year) {
            var saldos = jQuery.parseJSON('<?php echo json_encode($saldos); ?>');
            var selectedDate = moment((month) + '/' + year, 'MM/YYYY')
            valorSaldo(0);
            $.each(saldos, function(index, value) {
                if (moment(value.data, 'DD/MM/YYYY').isSameOrBefore(selectedDate)) {
                    valorSaldo(value.saldo)
                } else {
                    return false;
                }
            })

        }

        function valorSaldo(saldo) {
            var valor = saldo.toLocaleString('pt-br', {
                style: 'currency',
                currency: 'BRL'
            }).replace('-R$', 'R$ -')
            $(".table").bootstrapTable('updateRow', {
                index: 0,
                row: {
                    descricao: 'Saldo Anterior',
                    valor: valor,
                    _valor_data: {
                        value: saldo
                    }
                }
            });
        }

        function ValorFormatter(data) {
            var field = this.field;
            var valor = data.map(function(row) {
                var aux = row['_valor_data']['value'];
                if (row['tipolancamento'] == 1) {
                    return aux;
                } else {
                    return -aux;
                }
            }).reduce(function(sum, i) {
                return sum + i
            }, 0);
            return valor.toLocaleString("pt-BR", {
                style: "currency",
                currency: "BRL"
            }).replace('-R$', 'R$ -');
        }


        $(".d-none #left-month, .d-block #left-month").click(function() {
            var navButtons = '#right-month, #left-month';
            var activeColor = 'active bg-gradient-primary';
            var activeButton = $(".d-none .month button.active").not(navButtons);
            var month;
            var year = parseInt($(".year #year-value").text());
            if (activeButton.removeClass(activeColor).addClass(activeColor).text() == 'JAN') {
                activeButton.removeClass(activeColor);
                $("#mobileMonth").text($(".d-none .month button").not(navButtons).last().addClass(activeColor)
                .text());
                year--;
                $(".year #year-value").text(year);
                month = parseInt($(".d-none .month button").not(navButtons).last().addClass(activeColor).index());
            } else {
                $("#mobileMonth").text(activeButton.removeClass(activeColor).prev().addClass(activeColor).text());
                month = parseInt(activeButton.removeClass(activeColor).prev().addClass(activeColor).index());
            }
            changeMonthOrYear(month, year)
        })

        $(".d-none #right-month, .d-block #right-month").click(function() {
            var navButtons = '#right-month, #left-month';
            var activeColor = 'active bg-gradient-primary';
            var activeButton = $(".d-none .month button.active").not(navButtons);
            var month;
            var year = parseInt($(".year #year-value").text());
            if (activeButton.removeClass(activeColor).addClass(activeColor).text() == 'DEZ') {
                activeButton.removeClass(activeColor);
                $("#mobileMonth").text($(".d-none .month button").not(navButtons).first().addClass(activeColor)
                    .text());
                year++;
                $(".year #year-value").text(year);
                month = parseInt($(".d-none .month button").not(navButtons).first().addClass(activeColor).index());
            } else {
                $("#mobileMonth").text(activeButton.removeClass(activeColor).next().addClass(activeColor).text());
                month = parseInt(activeButton.removeClass(activeColor).next().addClass(activeColor).index());
            }
            changeMonthOrYear(month, year)
        })

        $(".d-none .month button").not('#right-month, #left-month').click(function() {
            var navButtons = '#right-month, #left-month';
            var activeColor = 'active bg-gradient-primary';
            var activeButton = $(".d-none .month button.active").not(navButtons);
            var clickedItem = $(this);
            var month;
            var year = parseInt($(".year #year-value").text());
            activeButton.removeClass(activeColor);
            clickedItem.addClass(activeColor)
            $("#mobileMonth").text(clickedItem.text())
            month = clickedItem.index();
            changeMonthOrYear(month, year)
        })

        $(".year #right-year").click(function() {
            var navButtons = '#right-year, #left-year';
            var month = $(".d-none .month button.active").not(navButtons).index();
            var year = parseInt($(".year #year-value").text());
            year++;
            $(".year #year-value").text(year);
            changeMonthOrYear(month, year);
        });

        $(".year #left-year").click(function() {
            var navButtons = '#right-year, #left-year';
            var month = $(".d-none .month button.active").not(navButtons).index();
            var year = parseInt($(".year #year-value").text());
            year--;
            $(".year #year-value").text(year);
            changeMonthOrYear(month, year);
        });

        $(document).ready(function() {
            var navButtons = '#right-month, #left-month';
            var activeColor = 'active bg-gradient-primary';
            var now = moment(new Date);
            changeMonthOrYear(now.format('MM'), now.format('YYYY'));
            var array = $(".d-none .month button").not(navButtons);
            $.each(array, function(index) {
                if ((index + 1) == now.format('MM')) {
                    array.eq(index).addClass(activeColor)
                    $("#mobileMonth").text(array.eq(index).text())
                    return false;
                }
            })
        });
    </script>
@endpush
