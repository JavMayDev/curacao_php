function denyEmpty(formControl) {
    if (!formControl.value) formControl.classList.add('is-invalid');
    else formControl.classList.remove('is-invalid');
}

console.log('hello world?');

function validateForm() {
    // get all fields with form-control class
    var formControls = document.getElementsByClassName('form-control');

    // set as invalid all fields with empty values
    for (var i = 0; i < formControls.length; i++) {
        denyEmpty(formControls[i]);
    }

    // ESPECIAL CASES

    // dates
    var deliveryDateElement = document.getElementsByName('delivery_date')[0];
    var serviceDate = new Date(
        document.getElementsByName('service_date')[0].value + 'T00:00:00'
    );
    var deliveryDate = new Date(deliveryDateElement.value + 'T00:00:00');

    var dayDiff = (deliveryDate - serviceDate) / (1000 * 60 * 60 * 24);
    if (
        dayDiff >= 30 &&
	// and if there aren't warngins already
        !deliveryDateElement.parentElement.getElementsByClassName('text-danger')[0]
    ) {
        deliveryDateElement.classList.add('is-invalid');
        var errorFeedback = document.createElement('div');
        errorFeedback.classList.add('text-danger');
        errorFeedback.appendChild(
            document.createTextNode(
                'la fecha de entrega no puede ser mayor a 30 dias desde la fecha de servicio'
            )
        );
        deliveryDateElement.parentElement.appendChild(errorFeedback);
    }
    else if (deliveryDate.parentElement.getElementsByClassName('text-danger')[0]) {
        deliveryDateElement.classList.remove('is-invalid');
        deliveryDateElement.parentElement.removeChild(
            document.getElementsByClassName('text-danger')
        );
    }

    for (var i = 0; i < formControls.length; i++) {
        if (!formControls[i].classList.contains('is-invalid')) {
            alert(
                'Tienes errores en el formulario, por favor revisalo y vuelve intentar enviarlo'
            );
            return false;
        }
    }

    return false;
}
