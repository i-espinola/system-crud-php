// Set JS version
/*jshint esversion: 6 */

$(document).ready(function () {

    $('.money').mask('000.000.000', {
        reverse: true
    });
    $('.cpf').mask('000.000.000-00');
    $('.datepicker, .date').mask('00/00/0000');
});

function toggleModal(el) {
    $(el + ' button.btn-primary').toggleClass("d-none");
    $(el + ' .modal-title').toggleClass("d-none");
}

function add(e) {
    var el = e.target;
    var id = $(el).closest('.modal').attr('id');
    var idShort = id.substr(6);

    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: 'http://agenciatakeoff.com.br/test/assets/php/' + idShort + '_add.php',
        data: $('#modal-' + idShort + ' form').serialize(),
        success: function (response) {
            console.log(response);
        }
    });
    location.reload(true);
}

function del(el) {
    var idDel = $(el).closest(".table-actions").find('span').text();
    var id = $(el).closest('.tab-pane').attr('id');

    $.ajax({
        type: 'POST',
        url: 'http://agenciatakeoff.com.br/test/assets/php/' + id + '_del.php',
        data: {
            id: idDel
        },
        success: function (response) {
            console.log(response);
        }
    });
    location.reload(true);
}

function edit(el, event) {
    var modal = $(el).closest(".modal");
    var id = $(el).closest('.modal').attr('id');
    var idShort = id.substr(6);
    var data = "id=" + $(el).closest(".modal-footer").find('span').text() + '&';
    data += $(modal).find('form').serialize();

    event.preventDefault();
    $.ajax({
        type: 'POST',
        url: 'http://agenciatakeoff.com.br/test/assets/php/' + idShort + '_edit.php',
        data: data,
        success: function (response) {
            console.log(response);
        }
    });
    location.reload(true);
}

function clean(el) {
    var father = "#" + $(el).closest(".modal").attr('id');
    $(father + ' .modal-footer span').remove();
    $(father + ' form input').val('');
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
            i--;
            if ($(this).text().indexOf('m²') != -1) {
                data.push($(this).text().substring(0, ($(this).text().length - 3)));

            } else {
                data.push($(this).text());
            }
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
