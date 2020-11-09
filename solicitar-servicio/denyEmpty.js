$(document).ready(function () {
    Array.from(document.getElementsByClassName('form-control')).forEach(
        function (formControl) {
            if (formControl.getAttribute('denyempty'))
                formControl.addEventListener('blur', function () {
                    if (!formControl.value)
                        formControl.classList.add('is-invalid');
                    else formControl.classList.remove('is-invalid');
                });
        }
    );
});
