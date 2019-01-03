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
})