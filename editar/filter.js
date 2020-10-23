// this script filtes the form inputs/fields that has being changed by removing
// the "name" attribute in each element that keeps as the same

function filter() {
    // event.preventDefault();
    console.log('testing script');

    Object.keys(row_data).map(function (key) {
        var element = document.getElementsByName(key)[0];
        if (!element) {
            console.log('no element: ', key);
        } else if (element.value == row_data[key]) element.removeAttribute('name');
    });

    console.log( 'lets return true' );
    return true;
}
