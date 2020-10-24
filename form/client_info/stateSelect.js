var countries = [
    {
        country_name: 'El Salvador',
        states: [
            'Ahuachapán',
            'Cabañas',
            'Chalatenango',
            'Cuscatlán',
            'La Libertad',
            'La Paz',
            'La Unión',
            'Morazán',
            'San Miguel',
            'San Salvador',
            'San Vicente',
            'Santa Ana',
            'Sonsonate',
            'Usulután',
        ],
    },
    {
        country_name: 'Guatemala',
        states: [
            'Alta Verapaz',
            'Baja Verapaz',
            'Chimaltenango',
            'Chiquimula',
            'El Progreso',
            'Escuintla',
            'Guatemala',
            'Huehuetenango',
            'Izabal',
            'Jalapa',
            'Jutiapa',
            'Petén',
            'Quetzaltenango',
            'Quiché',
            'Retalhuleu',
            'Sacatepéquez',
            'San Marcos',
            'Santa Rosa',
            'Sololá',
            'Suchitepéquez',
            'Totonicapán',
            'Zacapa',
        ],
    },
    {
        country_name: 'Honduras',
        states: [
            'Atlántida',
            'Colón',
            'Comayagua',
            'Copán',
            'Cortés',
            'Choluteca',
            'El Paraíso',
            'Francisco Morazán',
            'Gracias a Dios',
            'Intibucá',
            'Islas de la Bahía',
            'La Paz',
            'Lempira',
            'Ocotepeque',
            'Olancho',
            'Santa Bárbara',
            'Valle',
            'Yoro',
        ],
    },
    {
        country_name: 'Nicaragua',
        states: [
            'Boaco',
            'Carazo',
            'Chinandega',
            'Chontales',
            'Costa Caribe Norte',
            'Costa Caribe Sur',
            'Estelí',
            'Granada',
            'Jinotega',
            'León',
            'Madriz',
            'Managua',
            'Masaya',
            'Matagalpa',
            'Nueva Segovia',
            'Río San Juan',
            'Rivas',
        ],
    },
    {
        country_name: 'México',
        states: [
            'Aguascalientes',
            'Baja California',
            'Baja California Sur',
            'Campeche',
            'Chiapas',
            'Chihuahua',
            'Ciudad de México',
            'Coahuila',
            'Colima',
            'Durango',
            'Guanajuato',
            'Guerrero',
            'Hidalgo',
            'Jalisco',
            'Estado México',
            'Michoacán de Ocampo',
            'Morelos',
            'Nayarit',
            'Nuevo León',
            'Oaxaca',
            'Puebla',
            'Querétaro',
            'Quintana Roo',
            'San Luis Potosí',
            'Sinaloa',
            'Sonora',
            'Tabasco',
            'Tamaulipas',
            'Tlaxcala',
            'Veracruz',
            'Yucatán',
            'Zacatecas',
        ],
    },
];

var countrySelect = document.getElementsByName('country')[0];
var stateSelect = document.getElementsByName('state')[0];

countries.forEach(function (c) {
    var option = document.createElement('option');
    option.appendChild(document.createTextNode(c.country_name));
    option.value = c.country_name;

    countrySelect.appendChild(option);
});

function onCountryBlur() {

    stateSelect.value = null;

    // if stateSelect isn't empty remove all children
    if (stateSelect.children.length > 0)
        while (stateSelect.firstChild)
            stateSelect.removeChild(stateSelect.lastChild);

    var states = countries.find(function (c) {
        return c.country_name === countrySelect.value;
    });
    states.states.forEach(function (state) {
        var option = document.createElement('option');
        option.appendChild(document.createTextNode(state));
        option.value = state;

        stateSelect.appendChild(option);
    });
}
