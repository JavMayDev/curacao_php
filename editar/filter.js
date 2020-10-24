// this script filtes the form inputs/fields that has being changed by removing
// the "name" attribute in each element that keeps as the same

function filter() {
    // event.preventDefault();

    var checkbox = document.getElementsByName('active')[0];
    Object.keys(row_data).map(function (key) {
        var element = document.getElementsByName(key)[0];
        if (element)
            if (element.value == row_data[key] && element.name !== 'active')
                // if keeps as the same don't submit it (by removing name attribute)
                element.removeAttribute('name');
    });

    checkbox.value = checkbox.checked ? '1' : '0';

    return true;
    // return false;
}
