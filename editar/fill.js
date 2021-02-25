// this script fills the form fields with the row data

var country = countries.find(function (c) {
    return c.country_name === row_data.country;
});

if (country)
    country.states.forEach(function (state) {
        var option = document.createElement('option');
        option.appendChild(document.createTextNode(state));
        option.value = state;

        stateSelect.appendChild(option);
    });

Object.keys(row_data).map(function (key) {
    var element = document.getElementsByName(key)[0];
    if (!element) return;
    element.value = row_data[key];
});

// HARDCODE ESPECIAL CASES

// checkbox
var checkbox = document.getElementsByName('active')[0];
checkbox.removeAttribute('value');
checkbox.checked = row_data.active === '1';

// dates
document.getElementsByName(
    'service_date'
)[0].value = row_data.service_date.split(' ')[0];
document.getElementsByName(
    'delivery_date'
)[0].value = row_data.delivery_date.split(' ')[0];

// product image
if (row_data.product_image_filename) {
    // add image
    var productImage = new Image();
    productImage.style.maxWidth = '100%';
    productImage.src =
        location.origin + '/products_images/' + row_data.product_image_filename;
    document.getElementById('product-image').appendChild(productImage);

    // remove input
    document.getElementById('product-image-input').remove();
}
