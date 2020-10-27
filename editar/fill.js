// this script fills the form fields with the row data

console.log('testing script');
console.log('countries: ', countries);

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

console.log('checkbox on fill: ', checkbox);
console.log( 'active on row data: ', row_data.active);
console.log( 'type of active on row data: ', typeof row_data.active );

checkbox.checked = row_data.active === '1';

// dates
document.getElementsByName(
    'service_date'
)[0].value = row_data.service_date.split(' ')[0];
document.getElementsByName(
    'delivery_date'
)[0].value = row_data.delivery_date.split(' ')[0];
