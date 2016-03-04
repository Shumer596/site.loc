$(document).ready(init);

function init() {
    $('#registrationform-status').bind('change', desc);
}

function desc() {
    var op = $('#registrationform-status').val();
    switch (op) {
        case 'Person':
            $("#Individual_form").show();
            $("#Legal_form").hide();
            break;
        case 'Company':
            $("#Legal_form").show();
            $("#Individual_form").hide();
            break;
    }
}