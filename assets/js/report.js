$(document).ready(function () {
    var server_url = $('#server_url').val();
    var items = [];
    var is = [];
    $.ajax({

        type: "POST",
        url: server_url + "/item/get_skuJSON/",
        data: {
            search_string: ''
        },
        dataType: 'json'
    }).done(function (data) {
        items = data;

        $('#sltitem').autocomplete({
            source: items
        });
    }).fail(function () {

    });



    $.ajax({

        type: "POST",
        url: server_url + "/item/get_skuJSON1/",
        data: {
            search_string: ''
        },
        dataType: 'json'
    }).done(function (data) {
        inword = data;

        $('#sltitem1').autocomplete({
            source: inword
        });
    }).fail(function () {

    });



    shortcut.add("alt+b", function () {
        //alert("cliked");
        $('#btn-non-billing').trigger('click');

    });
    $('#btn-non-billing').on('click', function () {
        $('#frm-non-billing').submit();
    });

    shortcut.add("alt+w", function () {

        $('#btn-billing').trigger('click');

    });
    $('#btn-billing').on('click', function () {
        $('#frm-billing').submit();
    });

    //-----------shortcut show bill details----(billing/nonbilling)-----------------------------------------------------
    shortcut.add("alt+b", function () {
        //alert("cliked");
        $('.mix-bill').trigger('click');

    });
    $('.mix-bill').on('click', function () {

    });

    shortcut.add("alt+w", function () {

        $('.white-bill').trigger('click');

    });
    $('.white-bill').on('click', function () {

    });
    //----------------------------------------------------------------------------------------------------------------------


    var a = $('#sltsup').val();
    $('#hitem-sup').val(a);

    $("#btn-exc").click(function (e) {
        window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#dv-data').html()));
        e.preventDefault();
    });

    var a = $('#hInvoice_id').val();
    $('#Invoice_no').val(a);

    $('#btn-excelrpt').on('click', function () {
        $('#form-excel').submit();
    });


    var a = $('.item-sku').val();
    $('#hitem-sku').val(a);

    $('#btn-excepreport').on('click', function () {
        $('#form-excel').submit();
    });

    $('#btn-excelrpt').on('click', function () {

        $('#form-excelrpt').submit();
        window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#dv-data').html()));
        e.preventDefault();

    });
    $('#sltitem').on('keyup', function (event) {

        if (event.keyCode == 13) {
            $('#submit-show').submit();
        }
    });
    $('#sltitem1').on('keyup', function (event) {

        if (event.keyCode == 13) {
            $('#submit-show').submit();
        }
    });



    $('#item-qty-alert').on('keyup', function () {
        var qty = parseInt($('#item-qty-alert').val());
        $.each($('.item-qty'), function (index, ele) {
            var stock_qty = parseInt($(ele).val());
            $(ele).parent().parent().css('background-color', 'white');
            if (stock_qty <= qty) {
                $(ele).parent().parent().css('background-color', 'rgb(255,125,100)');
            }
        });
    });
    $('#inworditem').on('keyup', function (event) {
        if (event.keyCode == 13) {
            $('#submit-show').submit();
        }
    });


    $('#item-qty-alert').on('keyup', function () {
        var qty = parseInt($('#item-qty-alert').val());
        $.each($('.item-qty'), function (index, ele) {
            var stock_qty = parseInt($(ele).val());
            $(ele).parent().parent().css('background-color', 'white');
            if (stock_qty <= qty) {
                $(ele).parent().parent().css('background-color', 'rgb(255,125,100)');
            }
        });
    });
});