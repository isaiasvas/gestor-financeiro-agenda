function resetTable() {
    var all = [];
    for (let i = 0; i <= "{{$lastid}}"; i++) {
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

    for (var key in obj) {

        var mes = moment(obj[key].vencimento, 'DD-MM-YYYY').format('MM');
        var ano = moment(obj[key].vencimento, 'DD-MM-YYYY').format('YYYY');

        if ((mes == month) && (ano == year)) {
            a.push(obj[key].id.toString());

        }
    }
    $(".table").bootstrapTable('filterBy', {
        id: a
    });

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
    }, 0)
    $("#totalMobile").text(valor.toLocaleString("pt-BR", {
        style: "currency",
        currency: "BRL"
    }).replace('-R$', 'R$ -'));
    return valor.toLocaleString("pt-BR", {
        style: "currency",
        currency: "BRL"
    }).replace('-R$', 'R$ -');

}