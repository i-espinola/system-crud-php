// Set JS version
/*jshint esversion: 6 */


$(document).ready(function () {

    inputMask();

});

function inputMask() {
    $('.money').mask('000.000.000', {
        reverse: true
    });
    $('.cpf').mask('000.000.000-00');
    $('.find-id').mask('00');
    $('.date').mask('00/00/0000');

    $('.v-max').keyup(function (e) {

    });

}

function toggleModal(el) {
    $(el + ' button.btn-primary').toggleClass("d-none");
    $(el + ' .modal-title').toggleClass("d-none");
}

function add(e) {
    e.preventDefault();
    var el = e.target;
    var id = $(el).closest('.modal').attr('id');
    var idShort = id.substr(6);
    var nForm = $('#modal-' + idShort + ' form');
    var multiForm = [];
    var chk = 0;

    for (i = 0; i < nForm.length; i++) {
        var newId = nForm.eq(i).data('id');
        newId = newId.substr(5);
        multiForm.push(newId);

        $.ajax({
            type: 'POST',
            async: true,
            url: 'assets/php/' + newId + '_add.php',
            data: nForm.eq(i).serialize(),
            success: function () {

            },
            error: function () {
                count();
            }
        });
    }


    for (i = 0; i < multiForm.length; i++) {
        var upDate = multiForm[i];
        $("#" + upDate + " .table-responsive").load(location.href + " #" + upDate + " .table-responsive");
    }

    if (chk == 0) {
        $("[id*='modal-']").modal('hide');
        $("#modal-success").modal('show');
    } else {
        $("[id*='modal-']").modal('hide');
        $("#modal-fail").modal('show');
    }

    clean(el);
}

function count() {
    chk++;
}

function del(el) {
    var idDel = $(el).closest(".table-actions").find('span').text();
    var id = $(el).closest('.tab-pane').attr('id');

    $.ajax({
        type: 'POST',
        url: 'assets/php/' + id + '_del.php',
        data: {
            id: idDel
        },
        success: function () {
            $("#modal-" + id).modal('hide');
            $("#modal-success").modal('show');
            $("#" + id + " .table-responsive").load(location.href + " #" + id + " .table-responsive");
        },
        error: function () {
            $("#modal-" + id).modal('hide');
            $("#modal-fail").modal('show');
            $("#" + id + " .table-responsive").load(location.href + " #" + id + " .table-responsive");
        }
    });
}

function edit(el, event) {
    var data = "id=" + $(el).closest(".modal-footer").find('span').text() + '&';
    var id = $(el).closest('.modal').attr('id');
    var modal = $(el).closest(".modal");
    var idShort = id.substr(6);
    data += $(modal).find('form').serialize();
    event.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'assets/php/' + idShort + '_edit.php',
        data: data,
        success: function (response) {
            $("#modal-" + idShort).modal('hide');
            $("#modal-success").modal('show');
            $("#" + idShort + " .table-responsive").load(location.href + " #" + idShort + " .table-responsive");
        },
        error: function (response) {
            $("#modal-" + idShort).modal('hide');
            $("#modal-fail").modal('show');
        }
    });
}

function clean(el) {
    var father = "#" + $(el).closest(".modal").attr('id');
    $(father + ' .modal-footer span').remove();
    $(father + ' form input').val('');
    $(father + ' .datepicker').val("").datepicker("update");
    $(father + ' .nav-wrapper').show();

    if ($(father + ' button.btn-primary.add').hasClass("d-none")) {
        toggleModal(father);
    }
}

function modalEdit(el) {
    var modal = $(el).closest(".card").find(".rounded-circle").data('target');
    var id = $(el).closest(".table-actions").find('span').clone(true);
    var i = $(el).closest("tr").find("td").length;
    var row = $(el).closest("tr").find("td");
    var input = $(modal).find(".form-control");
    var data = [];

    row.map(function () {
        if (i > 0) {
            if ($(el).closest("tr").find("td").length != i) {
                if ($(this).text().indexOf('m²') != -1) {
                    data.push($(this).text().substring(0, ($(this).text().length - 3)));

                } else {
                    data.push($(this).text());
                }
            }
            i--;
        }
    });

    $(el).closest(".card").find(".rounded-circle").click();
    $(modal + ' .nav-wrapper').hide();
    $(modal + ' .modal-footer').append(id);

    for (i = 0; i <= data.length; i++) {
        if ($(input[i]).attr('id') != 'tipo') {
            $(input[i]).val(data[i]);
        } else {
            $(input[i]).find('option:contains(' + data[i] + ')').prop({
                selected: true
            });
        }
    }

    if (!$(modal + ' button.btn-primary.add').hasClass("d-none")) {
        toggleModal(modal);
    }
}

function subNavigator(el) {
    var father = $(el).closest(".modal-body");
    var to = $(el).data("option");
    var from = $(el).closest(".nav-fill").find(".active").data("option");

    if ($(father).find("form[data-id=form-" + to + "]").length === 0) {
        var clone = $("#modal-" + to).find("form[data-id=form-" + to + "]").clone(true);
        $(father).find("form[data-id=form-" + from + "]").hide();
        $(father).append(clone);
    } else {
        $(father).find("form[data-id=form-" + from + "]").hide();
        $(father).find("form[data-id=form-" + to + "]").show();
    }
}
