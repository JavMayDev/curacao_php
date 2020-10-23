// this script fills the form fields with the row data

Object.keys(row_data).map(function(key){
    var element = document.getElementsByName(key)[0];
    if(typeof element === 'undefined') return;
    element.value = row_data[key];
});
