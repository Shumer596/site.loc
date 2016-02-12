$(document).ready(init);

function init() {
    $('#transport-status_charge').bind('change', desc);
}

function desc() {
    var op = $('#transport-status_charge').val();
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