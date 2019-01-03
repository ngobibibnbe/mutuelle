$(document).ready(function () {
    $('.ui.sidebar').sidebar({
        context: $('body'),
        dimPage: false
    })
        .sidebar('attach events', '#sidebar', 'toggle')
        .sidebar('setting', 'transition', 'slide along')
    $('.ui.sticky').sticky();
    $('.ui.accordion').accordion();

    $('#mainlogout').modal('attach events', '#logoutB', 'show')
    $('#mainlogout').modal('attach events', '#modalCB', 'show')
    $('#epargne').click(function () {
        $("#epargnemodal").modal('show');
    });

    $('#retrait').click(function () {
        $("#retraitmodal").modal('show');
    });

    $('#emprunt').click(function () {
        $("#empruntmodal").modal('show');
    });
    $('#remboursement').click(function () {
        $("#remboursementemodal").modal('show');
    });
    $('#social').click(function () {
        $("#socialmodal").modal('show');
    });


})