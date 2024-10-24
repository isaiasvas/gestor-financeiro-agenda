@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="">
                        <div class="card bg-body shadow">
                            <div class="card-body py-2 pt-3">
                                <div class="row">
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="shadow p-3 mb-3 bg-body rounded">
                                            <div class="card py-2 px-2">
                                                <div class="row pl-4">
                                                    <div class="col-md-6">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" id="vencendo_hoje" checked>
                                                            <label class="form-check-label text-primary" for="vencendo_hoje">{{ __('Vence hoje: R$') }} </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" id="vencidas" checked>
                                                            <label class="form-check-label text-danger" for="vencidas">{{ __('Vencidas: R$' ) }} </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" id="a_vencer" checked>
                                                            <label class="form-check-label" for="a_vencer">{{ __('A vencer: R$' ) }} </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" id="pagos" checked>
                                                            <label class="form-check-label text-success" for="pagos">{{ __('Pagas: R$' ) }} </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shadow p-3 mb-4 bg-body rounded">
                                    <div class="pt-4">
                                        <table class="table" data-toggle="table" data-click-to-select="true" data-search="true" data-locale="PT-BR">
                                            <thead>
                                                <tr>
                                                    <th data-radio="true"></th>
                                                    <th data-field="documento">Documento</th>
                                                    <th data-field="historico">Historico</th>
                                                    <th data-field="vencimento">Vencimento</th>
                                                    <th data-field="valor">Valor</th>
                                                    <th data-field="descricao">Descrição</th>
                                                    <th data-field="id">ID</th>
                                                </tr>

                                            </thead>
                                            <tbody>

                                                @foreach ( $contas as $conta)
                                                <tr class="{{ $conta->pago ? 'text-success ' : 'colorir'}}{{$conta->id}}" id="{{$conta->id}}" data-value="{{$conta}}">
                                                    <td data-radio="true"></td>
                                                    <td>{{$conta->documento}}</td>
                                                    <td>{{$conta->historico}}</td>
                                                    <td class="vencimento{{$conta->id}}">{{$conta->vencimento->format("d-m-Y")}}</td>
                                                    <td id="valor{{$conta->id}}">{{__("R$:")}} {{ number_format($conta->valor,2,",",".")}}</td>
                                                    <td>{{$conta->descricao}}</td>
                                                    <td>{{$conta->id}}</td>
                                                </tr>
                                                <input type="text" value="{{$conta->pago}}" id="pago{{$conta->id}}" hidden>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row pt-1  " id="toolbar">
                                        <div class="card">
                                            <div class="card-body py-2 px-sm-auto px-0">
                                                <div class="row">
                                                    <div class="col-sm-1 col-4 text-center text-secondary btn btn-link" id="ficha">
                                                        <i data-feather="file-text" style="height:40px; width: 40px;"></i></br>
                                                        Ficha
                                                    </div>
                                                    <div class="col-sm-1 col-4 text-center text-secondary btn btn-link" id="novo">
                                                        <i data-feather="plus" style="height:40px; width: 40px;"></i></br>
                                                        Novo
                                                    </div>
                                                    <div class="col-sm-1 col-4 text-center text-secondary btn btn-link" id="replicar">
                                                        <i data-feather="copy" style="height:40px; width: 40px;"></i></br>
                                                        Replicar
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Pagination Month</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <ul id="year" class="pagination pagination-month float-start  ">
                                    <li class="page-item" onclick="yearPrev()"><a class="page-link" href="javascript:void(0)">«</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)">
                                            <p class="page-month"></p>
                                        </a>
                                    </li>
                                    <li class="page-item" onclick="yearNext()"><a class="page-link" href="javascript:void(0)">»</a></li>
                                </ul>



                                <ul id="month" class="pagination pagination-month float-end">

                                    <li class="prev page-item"><a class="page-link" href="javascript:void(0)">«</a></li>

                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)">
                                            <p class="page-month">JAN</p>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)">
                                            <p class="page-month">FEV</p>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)">
                                            <p class="page-month">MAR</p>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)">
                                            <p class="page-month">ABR</p>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)">
                                            <p class="page-month">MAI</p>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)">
                                            <p class="page-month">JUN</p>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)">
                                            <p class="page-month">JUL</p>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)">
                                            <p class="page-month">AGO</p>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)">
                                            <p class="page-month">SET</p>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)">
                                            <p class="page-month">OUT</p>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)">
                                            <p class="page-month">NOV</p>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)">
                                            <p class="page-month">DEZ</p>
                                        </a>
                                    </li>

                                    <li class="next page-item"><a class="page-link" href="javascript:void(0)">»</a></li>

                                </ul>
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
    if ($(window).width() < 1900) {
        $('.table').attr('data-height', 310)
    } else {
        $('.table').attr('data-height', 530)
    }

    $('.table').bootstrapTable({
        onClickRow: function(row, $element) {
            $id = row.id;
        },
        onDblClickRow: function(row, $element, field) {
            window.location.href = "{{route('financeiro.index')}}/" + row.id + "/edit";
        },
        onSearch: function(text) {
            colorir();
        }
    });

    $("#ficha").on('click', function() {
        if ($id != null) {
            window.location.href = "{{route('financeiro.index')}}/" + $id + "/edit";
        }
    })

    $("#replicar").on('click', function() {
        if ($id != null) {
            window.location.href = "{{route('financeiro.index')}}/" + $id + "/replica";
        }
    })

    $("#novo").on('click', function() {
        window.location.href = "{{route('financeiro.create')}}"
    })

    function venceHoje() {
        var now = moment().format('YYYY-MM-DD');
        var obj = JSON.parse(JSON.stringify($(".table").bootstrapTable('getData')))
        var a = []
        for (var key in obj) {
            var vencimento = obj[key]._data.value.vencimento;
            var vencimento = moment(vencimento, "YYYY-MM-DD").format("YYYY-MM-DD");
            if (obj[key]._data.value.pago == 0) {

                if (vencimento == now) {
                    a.push(obj[key]._data.value.id.toString());
                }
            }
        }
        return a;
    }

    function vencidas() {
        var now = moment().format('YYYY-MM-DD');
        var obj = JSON.parse(JSON.stringify($(".table").bootstrapTable('getData')))
        var a = []
        for (var key in obj) {
            var vencimento = obj[key]._data.value.vencimento;
            var vencimento = moment(vencimento, "YYYY-MM-DD").format("YYYY-MM-DD");
            if (obj[key]._data.value.pago == 0) {
                if (vencimento < now) {
                    a.push(obj[key]._data.value.id.toString());
                }
            }
        }
        return a;
    }

    function aVencer() {
        var now = moment().format('YYYY-MM-DD');
        var obj = JSON.parse(JSON.stringify($(".table").bootstrapTable('getData')))
        var a = []
        for (var key in obj) {
            var vencimento = obj[key]._data.value.vencimento;
            var vencimento = moment(vencimento, "YYYY-MM-DD").format("YYYY-MM-DD");
            if (obj[key]._data.value.pago == 0) {
                if (vencimento > now) {
                    a.push(obj[key]._data.value.id.toString());
                }
            }
        }
        return a;
    }

    function pagos() {
        var now = moment().format('YYYY-MM-DD');
        var obj = JSON.parse(JSON.stringify($(".table").bootstrapTable('getData')))
        var a = []
        for (var key in obj) {
            var vencimento = obj[key]._data.value.vencimento;
            var vencimento = moment(vencimento, "YYYY-MM-DD").format("YYYY-MM-DD");
            if (obj[key]._data.value.pago == 1) {
                a.push(obj[key]._data.value.id.toString());
            }
        }
        return a;
    }

    function colorir() {
        var vence_hoje = 0;
        var vencidas = 0;
        var a_vencer = 0;
        var pagas = 0;
        var now = moment().format('YYYY-MM-DD');
        var obj = JSON.parse(JSON.stringify($(".table").bootstrapTable('getData')))

        for (var key in obj) {
            var vencimento = obj[key]._data.value.vencimento;
            var vencimento = moment(vencimento, "YYYY-MM-DD").format("YYYY-MM-DD");
            var colorir = ".colorir" + obj[key]._data.value.id;
            if (obj[key]._data.value.pago == 0) {

                if (vencimento == now) {
                    $(colorir).addClass("text-primary")
                    vence_hoje += obj[key]._data.value.valor;
                }
                if (vencimento > now) {
                    a_vencer += obj[key]._data.value.valor;
                }
                if (vencimento < now) {
                    $(colorir).addClass("text-danger")
                    vencidas += obj[key]._data.value.valor;
                }
            } else {
                pagas += obj[key]._data.value.valor;
            }
        }

        $("label[for='vencidas']").text("Vencidas: " + vencidas.toLocaleString('pt-br', {
            style: 'currency',
            currency: 'BRL'
        }))
        $("label[for='vencendo_hoje']").text("Vence hoje: " + vence_hoje.toLocaleString('pt-br', {
            style: 'currency',
            currency: 'BRL'
        }))
        $("label[for='a_vencer']").text("A Vencer: " + a_vencer.toLocaleString('pt-br', {
            style: 'currency',
            currency: 'BRL'
        }))
        $("label[for='pagos']").text("Contas Pagas: " + pagas.toLocaleString('pt-br', {
            style: 'currency',
            currency: 'BRL'
        }))
    }

    $("#vencendo_hoje").on('change', function() {
        var all = [];
        for (let i = 0; i <= "{{count($contas)}}"; i++) {
            all.push(i.toString());
        }
        $(".table").bootstrapTable('filterBy', {
            id: all
        });

        //BOTÃO VENCENDO HOJE
        if ($("#vencendo_hoje").prop("checked")) {
            var all = [];

            all = all.concat(venceHoje());
            if ($("#vencidas").prop("checked")) {
                all = all.concat(vencidas());
            }
            if ($("#a_vencer").prop("checked")) {
                all = all.concat(aVencer());
            }
            if ($("#pagos").prop("checked")) {
                all = all.concat(pagos());
            }
            $(".table").bootstrapTable('filterBy', {
                id: all
            });

        } else {
            all = [];
            if ($("#vencidas").prop("checked")) {
                all = all.concat(vencidas());
            }
            if ($("#a_vencer").prop("checked")) {
                all = all.concat(aVencer());
            }
            if ($("#pagos").prop("checked")) {
                all = all.concat(pagos());
            }
            $(".table").bootstrapTable('filterBy', {
                id: all
            });
        }

        colorir();
    });

    $("#vencidas").on('change', function() {
        var all = [];
        for (let i = 0; i <= "{{count($contas)}}"; i++) {
            all.push(i.toString());
        }
        $(".table").bootstrapTable('filterBy', {
            id: all
        });

        //VENCIDAS
        if ($("#vencidas").prop("checked")) {
            var all = [];
            all = all.concat(vencidas());
            if ($("#vencendo_hoje").prop("checked")) {
                all = all.concat(venceHoje());
            }
            if ($("#a_vencer").prop("checked")) {
                all = all.concat(aVencer());
            }
            if ($("#pagos").prop("checked")) {
                all = all.concat(pagos());
            }
            $(".table").bootstrapTable('filterBy', {
                id: all
            });
        } else {
            var all = [];
            if ($("#vencendo_hoje").prop("checked")) {
                all = all.concat(venceHoje());
            }
            if ($("#a_vencer").prop("checked")) {
                all = all.concat(aVencer());
            }
            if ($("#pagos").prop("checked")) {
                all = all.concat(pagos());
            }
            $(".table").bootstrapTable('filterBy', {
                id: all
            });
        }
        colorir();
    })
    $("#a_vencer").on('change', function() {
        var all = [];
        for (let i = 0; i <= "{{count($contas)}}"; i++) {
            all.push(i.toString());
        }
        $(".table").bootstrapTable('filterBy', {
            id: all
        });

        //a_vencer
        if ($("#a_vencer").prop("checked")) {

            var all = [];
            all = all.concat(aVencer());
            if ($("#vencendo_hoje").prop("checked")) {
                all = all.concat(venceHoje());
            }
            if ($("#vencidas").prop("checked")) {
                all = all.concat(vencidas());
            }
            if ($("#pagos").prop("checked")) {
                all = all.concat(pagos());
            }
            $(".table").bootstrapTable('filterBy', {
                id: all
            });

        } else {
            var all = [];

            if ($("#vencendo_hoje").prop("checked")) {
                all = all.concat(venceHoje());
            }
            if ($("#vencidas").prop("checked")) {
                all = all.concat(vencidas());
            }
            if ($("#pagos").prop("checked")) {
                all = all.concat(pagos());
            }
            $(".table").bootstrapTable('filterBy', {
                id: all
            });
        }
        colorir();
    })

    $("#pagos").on('change', function() {
        var all = [];
        for (let i = 0; i <= "{{count($contas)}}"; i++) {
            all.push(i.toString());
        }
        $(".table").bootstrapTable('filterBy', {
            id: all
        });

        //pagos
        if ($("#pagos").prop("checked")) {

            var all = [];
            all = all.concat(pagos());
            if ($("#vencendo_hoje").prop("checked")) {
                all = all.concat(venceHoje());
            }
            if ($("#vencidas").prop("checked")) {
                all = all.concat(vencidas());
            }
            if ($("#a_vencer").prop("checked")) {
                all = all.concat(aVencer());
            }
            $(".table").bootstrapTable('filterBy', {
                id: all
            });

        } else {
            var all = [];

            if ($("#vencendo_hoje").prop("checked")) {
                all = all.concat(venceHoje());
            }
            if ($("#vencidas").prop("checked")) {
                all = all.concat(vencidas());
            }
            if ($("#a_vencer").prop("checked")) {
                all = all.concat(aVencer());
            }
            $(".table").bootstrapTable('filterBy', {
                id: all
            });
        }
        colorir();
    })

    function yearPrev() {
        var year = $("#year .page-month").text();
        year--;
        $("#year .page-month").text(year);
    }

    function yearNext() {
        var year = $("#year .page-month").text();
        year++;
        $("#year .page-month").text(year);
    }

    function changeMonthOrYear(month, year) {
        $.ajax({
            dataType: 'GET',
            url: "{{route('financeiro.month')}}",
            data: { month: month, year:year},
            success: function(data){
                
            }
        })
        
       

    }

    $(document).ready(function() {
        var header = $('#month li').not(".prev,.next");
        var month = "{{Carbon\Carbon::now()->month}}";
        $('#month li:nth-child(' + (parseInt(month) + 1) + ')').addClass("active");
        var year = new Date().getFullYear();
        colorir();
        var pageItem = $("#month.pagination li").not(".prev,.next");
        var prev = $("#month.pagination li.prev");
        var next = $("#month.pagination li.next");

      
        $("#year .page-month").text(year);
        pageItem.click(function() {
            pageItem.removeClass("active");
            $(this).not(".prev,.next").addClass("active");
            changeMonthOrYear($(this).index(),$("#year .page-month").text());
        });

        next.click(function() {
            var currentActive = $('#month li.active'); // get current active
            currentActive.removeClass('active'); // remove class active

            if (currentActive.next('li').is(':last-child')) {
                pageItem.first().addClass('active'); // add class to first li if last child
                year++;
                $("#year .page-month").text(year);
            } else {
                currentActive.next('li').addClass('active'); // otherwise add active to next li
            }
        });
        prev.click(function() {
            var currentActive = $('#month li.active'); // get current active
            currentActive.removeClass('active'); // remove class active

            if (currentActive.prev('li').is(':first-child')) {
                pageItem.last().addClass('active'); // add class to first li if last child
                year--;
                $("#year .page-month").text(year);
            } else {
                currentActive.prev('li').addClass('active'); // otherwise add active to next li

            }
        });
    });
</script>
@endpush