$(document).ready(init);

function init() {
    $('#transport-status_charge').bind('change', desc);
}

function desc() {
    var op = $('#transport-status_charge').val();
    switch (op) {
        case 'Specify date':
            $(".field-transport-charge_start").show();
            $(".field-transport-charge_end").show();
            break;
        case 'Always':
            $(".field-transport-charge_start").hide();
            $(".field-transport-charge_end").hide();
            break;
        case 'Today':
            $(".field-transport-charge_start").hide();
            $(".field-transport-charge_end").hide();
            break;
    }
}