var $ = jQuery.noConflict();

//Car Appear In View
function isScrolledIntoView(elem) {
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top + 180;
    var elemBottom = elemTop + $(elem).height() - 500;

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}

$(function() {
    jQuery(".bt-switch").bootstrapSwitch();

    $('.running-car').each(function () {
        if (isScrolledIntoView(this) === true) {
            $(this).addClass('in-view');
        } else {
            $(this).removeClass('in-view');
        }
    });
});

$(window).scroll(function () {
   $('.running-car').each(function () {
        if (isScrolledIntoView(this) === true) {
            $(this).addClass('in-view');
        } else {
            $(this).removeClass('in-view');
        }
    });
});

$('#danger-alert').click(function () {
    Swal.fire({
		title: 'Deseja realmente excluir a dica?',
		showDenyButton: true,
		confirmButtonText: 'Sim',
		denyButtonText: 'Não',
		}).then((result) => {
		if (result.isConfirmed) {
			window.location.href = $('#danger-alert').attr("data-link");
		}
	})
});
