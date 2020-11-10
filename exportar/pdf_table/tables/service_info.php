<?php
$service_info_table = "
<table class='section'>
    <tr>
        <td class='header' colspan='2'>Informacion del servicio</td>
    </tr>
    <tr>
        <td class='field' style='width: 25%'>Servicio</td>
        <td style='width: 75%'>${row['service_type']}</td>
    </tr>
</table>
<table>
    <tr>
        <td class='field' style='width: 25%'>No. de servicio</td>
        <td style='width: 25%'>${row['order_num']}</td>
	<td class='field' style='width: 25%'>No. de cuenta</td>
        <td style='width: 25%'>${row['client_account_num']}</td>
    </tr>
    <tr>
        <td class='field' style='width: 25%'>Fecha de servicio</td>
        <td style='width: 25%'>${row['service_date']}</td>
	<td class='field' style='width: 25%'>Fecha de entrega</td>
        <td style='width: 25%'>${row['delivery_date']}</td>
    </tr>
</table>
<table>
    <tr>
        <td class='field' style='width: 25%'>Tienda donde se realizo la venta</td>
        <td style='width: 75%'>${row['sale_store']}</td>
    </tr>
</table>
";
?>
