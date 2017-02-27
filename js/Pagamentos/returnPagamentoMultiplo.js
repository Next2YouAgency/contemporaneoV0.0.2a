function soma(e) {
    var total = 0;
    var valores = $('input[type="checkbox"]:checked');
    $.each(valores, function (i, v) {
        total = parseFloat(total) + parseFloat($(v).val());
    });

    $("#totalPagamento").val(total);
}

$('#selecionado').on('change', soma);