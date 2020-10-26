// this script fills the form with default values

var fields = {
    // service info
    service_type: 'servicio',
    order_num: 213435,
    client_account_num: 45673,
    sale_store: 'Los Angeles',

    // client info
    client_sender_name: 'Jose Lorem',
    client_receiver_name: 'Manuel Ipsum',
    local_tel: 654543,
    cel_tel: 5577322,

    // place
    country: 'México',
    state: 'Jalisco',
    city: 'Zapopan',
    suburb: 'Chapalita',
    street: 'Av las rosas',
    exterior_num: 6543,

    // product info
    article: 'Televisión',
    brand: 'LG',
    model: 'MX-LGHA123',
    problem_description:
        'Sample description Lorem ipsum dolor sit amet consectetur samle description',
    associated: 'Mario Dolor',
    supervisor: 'Renata Sit',
};

Object.keys(fields).map(function (key) {
    var element = document.getElementsByName(key)[0];
    if (!element) return;
    element.value = fields[key];
});

var now = new Date(Date.now());
var day = ('0' + now.getDate()).slice(-2);
var month = ('0' + (now.getMonth() + 1)).slice(-2);
document.getElementsByName('service_date')[0].value =
    now.getFullYear() + '-' + month + '-' + day;
