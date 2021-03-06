<?php

/* var_dump($row); */

$client_info_table = "
<table class='section'>
    <tr>
        <td class='header' colspan='2'>Informacion del cliente</td>
    </tr>
    <tr>
        <td class='field' style='width: 25%'>Cliente que envia</td>
        <td style='width: 75%'>${row['client_sender_name']}</td>
    </tr>
    <tr>
	<td class='field'>Cliente que recibe</td>
        <td >${row['client_receiver_name']}</td>
    </tr>
</table>
<table>
    <tr>
        <td class='field' style='width: 25%'>Telefono celular</td>
        <td style='width: 25%'>${row['cel_tel']}</td>
	<td class='field' style='width: 25%'>Telefono local</td>
        <td style='width: 25%'>${row['local_tel']}</td>
    </tr>
</table>
<table>
    <tr>
        <td class='header' colspan='2'>Direccion</td>
    </tr>
    <tr>
	<td style='width: 25%;' class='field'>Estado</td>
        <td style='width: 75%;' >${row['state']}</td>
    </tr>
    <tr>
	<td class='field'>Ciudad</td>
        <td >${row['city']}</td>
    </tr>
    <tr>
	<td class='field'>Colonia</td>
        <td >${row['suburb']}</td>
    </tr>
    <tr>
	<td class='field'>Calle</td>
        <td >${row['street']}</td>
    </tr>
    <tr>
	<td class='field'>Codigo postal</td>
        <td >${row['zip_code']}</td>
    </tr>
</table>
";
?>
