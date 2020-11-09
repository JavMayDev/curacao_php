document.addEventListener('DOMContentLoaded', function () {
    // fields that can cause invalidness in the form
    var serviceSelect = document.getElementsByName('service_type').item(0);
    var warranty = document.getElementsByName('warranty').item(0);
    var naCheckbox = document.getElementsByName('n_a').item(0);
    var coverageInput = document.getElementsByName('coverage').item(0);
    var deliveryDateInput = document.getElementsByName('delivery_date').item(0);

    // add the the next function as event lsitener in those fields
    serviceSelect.addEventListener('change', checkServiceAvailability);
    warranty.addEventListener('change', checkServiceAvailability);
    naCheckbox.addEventListener('change', checkServiceAvailability);
    coverageInput.addEventListener('change', checkServiceAvailability);
    deliveryDateInput.addEventListener('change', checkDate);

    function checkServiceAvailability() {

	// get day difference between delivery date and now
        var nowDate = new Date(Date.now());
        var deliveryDate = new Date(deliveryDateInput.value + 'T00:00:00');
        var diffTime = Math.abs(nowDate - deliveryDate);
        var dayDiff = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

        if (naCheckbox.checked) {
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
            // serviceSelect.value === 'reclamo' ||
            serviceSelect.value === 'servicio'
        ) {
            // if doesn't have warranty and wants to choose 'servicio'
            // set error feedback
            if (!warranty.checked) {
                setErrorFeedback(
                    serviceSelect,
                    true,
                    'no se puede solicitar este servicio sin garantía'
                );
            } else setErrorFeedback(serviceSelect, false);
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
        } else {
            // this things can't be wrong if 'service' isn't choosen
            setErrorFeedback(coverageInput, false);
            setErrorFeedback(serviceSelect, false);
        }
        console.log('day diff just before check reclamo: ', dayDiff);
        // if product older than 30 days can't choose 'reclamo'
        if (serviceSelect.value === 'reclamo' && dayDiff >= 30) {
            console.log('older than 30 days');
            setErrorFeedback(
                deliveryDateInput,
                true,
                'Solo tiene 30 dias para solicitar reclamo'
            );
        } else setErrorFeedback(deliveryDateInput, false);

        // if some of the fields that can cause invalidness is
        // in fact, invalid, block all form controls
        if (
            serviceSelect.classList.contains('is-invalid') ||
            warranty.classList.contains('is-invalid') ||
            coverageInput.classList.contains('is-invalid') ||
            deliveryDateInput.classList.contains('is-invalid')
        ) {
            console.log('lets block all form controls');
            lockForm(true);
        } else lockForm(false);
    }

    // window.onload = function () {
    // };

    // little function to check if future date selected
    function checkDate() {
        var deliveryDate = document.getElementsByName('delivery_date')[0];
        var date = new Date(deliveryDate.value);
        var toDate = new Date(Date.now());

        // is that in the future?
        if (date.getTime() > toDate.getTime()) {
            setErrorFeedback(
                deliveryDate,
                true,
                'No puedes elegir una fecha futura'
            );
        } else {
            setErrorFeedback(deliveryDate, false);
        }

        checkServiceAvailability();
    }

    var now = new Date(Date.now());
    var day = ('0' + now.getDate()).slice(-2);
    var month = ('0' + (now.getMonth() + 1)).slice(-2);
    document.getElementsByName('service_date')[0].value =
        now.getFullYear() + '-' + month + '-' + day;
});
