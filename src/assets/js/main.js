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
}

function toggleModal(el) {
    $(el + ' button.btn-primary').toggleClass("d-none");
    $(el + ' .modal-title').toggleClass("d-none");
}

function add(e) {
    e.preventDefault();
    let el = e.target;
    let id = $(el).closest('.modal').attr('id');
    let idShort = id.substr(6);
    let nForm = $('#modal-' + idShort + ' form');
    let multiForm = [];
    let asyncRequest = [];
    let requestCheck = [];
    debugger
    loading(el);

    for (i = 0; i < nForm.length; i++) {
        let newId = nForm.eq(i).data('id');
        newId = newId.substr(5);
        multiForm.push(newId);

        asyncRequest.push($.ajax({
            type: 'POST',
            async: true,
            url: 'assets/php/' + newId + '_add.php',
            data: nForm.eq(i).serialize(),
            success: function (response) {
                requestCheck.push(response);
            },
            error: function (response) {
                requestCheck.push(response);
            }
        }));
    }

    $.when.apply(null, asyncRequest).done(function () {
        for (i = 0; i < multiForm.length; i++) {
            let upDate = multiForm[i];
            $("#" + upDate + " .table-responsive").load(location.href + " #" + upDate + " .table-responsive");
        }

        if (Math.min(...requestCheck) === 0) {
            $("[id*='modal-']").modal('hide');
            $("#modal-fail").modal('show');
        } else {
            $("[id*='modal-']").modal('hide');
            $("#modal-success").modal('show');
        }
        clean(el);
    });
}

function del(el) {
    let idDel = $(el).closest(".table-actions").find('span').text();
    let id = $(el).closest('.tab-pane').attr('id');

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
    loading(el);
    let data = "id=" + $(el).closest(".modal-footer").find('span').text() + '&';
    let id = $(el).closest('.modal').attr('id');
    let modal = $(el).closest(".modal");
    let idShort = id.substr(6);
    data += $(modal).find('form').serialize();
    event.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'assets/php/' + idShort + '_edit.php',
        data: data,
        success: function () {
            $("#modal-" + idShort).modal('hide');
            $("#modal-success").modal('show');
            $("#" + idShort + " .table-responsive").load(location.href + " #" + idShort + " .table-responsive");
        },
        error: function () {
            $("#modal-" + idShort).modal('hide');
            $("#modal-fail").modal('show');
        }
    });
}

function clean(el) {
    let father = "#" + $(el).closest(".modal").attr('id');
    $(father + ' .modal-footer span').remove();
    $(father + ' form input').val('');
    $(father + ' .datepicker').datepicker("clearDates")
    $(father + ' .nav-wrapper').show();

    if ($(father + ' button.btn-primary.add').hasClass("d-none")) {
        toggleModal(father);
    }
}

function modalEdit(el) {
    let modal = $(el).closest(".card").find(".rounded-circle").data('target');
    let id = $(el).closest(".table-actions").find('span').clone(true);
    let i = $(el).closest("tr").find("td").length;
    let row = $(el).closest("tr").find("td");
    let input = $(modal).find(".form-control");
    let data = [];

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
    let father = $(el).closest(".modal-body");
    let to = $(el).data("option");
    let from = $(el).closest(".nav-fill").find(".active").data("option");

    if ($(father).find("form[data-id=form-" + to + "]").length === 0) {
        let clone = $("#modal-" + to).find("form[data-id=form-" + to + "]").clone(true);
        $(father).find("form[data-id=form-" + from + "]").hide();
        $(father).append(clone);
    } else {
        $(father).find("form[data-id=form-" + from + "]").hide();
        $(father).find("form[data-id=form-" + to + "]").show();
    }
}

function loading(el) {
    var $el = $(el);

    debugger
    $el.button('loading');

    $el.button('reset');

}
