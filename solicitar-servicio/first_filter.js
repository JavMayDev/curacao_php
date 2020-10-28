function checkServiceAvailability() {
    var serviceSelect = document.getElementsByName('service_type')[0];
    var warranty = document.getElementsByName('warranty')[0];
    var naCheckbox = document.getElementsByName('n_a')[0];
    coverageInput = document.getElementsByName('coverage')[0];

    if(naCheckbox.checked){
	warranty.setAttribute('disabled', true);
	setErrorFeedback(warranty, false);
	coverageInput.setAttribute('disabled', true);
	setErrorFeedback(coverageInput, false);
    } else {
	warranty.removeAttribute('disabled');
	coverageInput.removeAttribute('disabled');

    }

    // those values depends of the warranty and time transcurred
    if (
        serviceSelect.value === 'reclamo' ||
        serviceSelect.value === 'servicio'
    ) {
        console.log('is service or reclaim');
        // if doesn't have warranty and wants to choose 'servicio' or 'reclamo', set error feedback
        if (!warranty.checked) {
            setErrorFeedback(
                serviceSelect,
                true,
                'no se puede solicitar este servicio sin garantía'
            );
            return;
        } else setErrorFeedback(serviceSelect, false);

        var deliberyDateInput = document.getElementsByName('delivery_date')[0];
        var nowDate = new Date(Date.now());
        var deliveryDate = new Date(deliberyDateInput.value + 'T00:00:00');

        var diffTime = Math.abs(nowDate - deliveryDate);
        var dayDiff = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

        // if product older than 30 days can't choose 'reclamo'
        if (serviceSelect.value === 'reclamo' && dayDiff >= 30) {
            setErrorFeedback(
                deliberyDateInput,
                true,
                'Solo tiene 30 dias para solicitar reclamo'
            );
        } else setErrorFeedback(deliberyDateInput, false);

        if (serviceSelect.value === 'servicio') {
            // if empty field
            if (!coverageInput.value)
                setErrorFeedback(
                    coverageInput,
                    true,
                    'Por favor indique la covertura de la garantía'
                );
            else {
                setErrorFeedback(coverageInput, false);

                if (coverageInput.value < dayDiff / 365)
                    setErrorFeedback(
                        coverageInput,
                        true,
                        'La garantía no cubre el tiempo transcurrido'
                    );
                else setErrorFeedback(coverageInput, false);
            }
        } else setErrorFeedback(coverageInput, false);
    } else {
        console.log('isnt that service');
        setErrorFeedback(serviceSelect, false);
    }
}
