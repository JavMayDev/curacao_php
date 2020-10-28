function setErrorFeedback(formControl, error, feedbackMsg = null) {
    console.log( 'on setErrorFeedback' );
    if (error) {
        // if not checked as invalid yet:
        if (!formControl.classList.contains('is-invalid')) {
            formControl.classList.add('is-invalid');
            var errMsg = document.createElement('div');
            errMsg.classList.add('text-danger');
            errMsg.appendChild(document.createTextNode(feedbackMsg));
            formControl.parentElement.appendChild(errMsg);
        }
    } else {
	// if checked as invalid already
        if (formControl.classList.contains('is-invalid')) {
	    console.log( 'contains is invalid: ', formControl );
            formControl.classList.remove('is-invalid');
            var errMsg = formControl.parentElement.getElementsByClassName(
                'text-danger'
            )[0];
            formControl.parentElement.removeChild(errMsg);
	    console.log( 'after set as valid: ', formControl );
        }
    }
}
