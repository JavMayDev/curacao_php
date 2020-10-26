function checkServiceAvailability() {
    var serviceSelect = document.getElementsByName('service_type')[0];
    var warranty = document.getElementsByName('warranty')[0];

    // those values depends of the warranty and time transcurred
    if (
        serviceSelect.value === 'reclamo' ||
        serviceSelect.value === 'service'
    ) {
        // if doesn't have warranty and wants to choose 'servicio' or 'reclamo', set error feedback
        if (!warranty.checked) {
            setErrorFeedback(
                serviceSelect,
                true,
                'no se puede solicitar este servicio sin garantía'
            );
	    return
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

        if (serviceSelect.value === 'service') {
            coverageInput = document.getElementsByName('coverage')[0];

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
                        'su garantia ya ha expirado'
                    );
                else setErrorFeedback(coverageInput, false);
            }
        } else setErrorFeedback(coverageInput, false);
    }
}
