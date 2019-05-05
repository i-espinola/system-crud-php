$(document).ready(function () {});

function navRegister(el) {
	var father = $(el).closest(".modal-body");
	var to = $(el).data("option");
	var from = $(el).closest(".nav-fill").find(".active").data("option");

	if ($(father).find("#form-" + to).length === 0) {
		var clone = $("#modal-" + to).find("#form-" + to).clone();
		$(father).find("#form-" + from).hide();
		$(father).append(clone);
	} else {
		$(father).find("#form-" + from).hide();
		$(father).find("#form-" + to).show();
	}
}
