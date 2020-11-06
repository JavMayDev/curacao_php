function lockForm(lock) {

    // get all "lockable" elements and disable them	
    Array.from(document.getElementsByClassName('form-control')).forEach(
        function (formControl) {
            if (formControl.getAttribute('lockable'))
                formControl.disabled = lock;
        }
    );
}
