<?php
$product_info_table = "
<table class='section'>
    <tr>
        <td colspan='2' class='header'>Producto y problema</td>
    </tr>
    <tr>
        <td class='field' style='width: 25%'>Articulo</td>
        <td style='width: 75%'>${row['article']}</td>
    </tr>
    <tr>
        <td class='field' style='width: 25%'>Marca</td>
        <td style='width: 75%'>${row['brand']}</td>
    </tr>
    <tr>
        <td class='field' style='width: 25%'>Modelo</td>
        <td style='width: 75%'>${row['model']}</td>
    </tr>
    <tr>
        <td colspan='2' class='field'>Descripcion del problema</td>
    </tr>
    <tr>
        <td colspan='2'>${row['problem_description']}</td>
    </tr>
    <tr>
        <td colspan='2' class='field'>Notas</td>
    </tr>
    <tr>
        <td colspan='2'>${row['notes']}</td>
    </tr>
    <tr>
        <td class='field' style='width: 25%'>Servicio enviado por:</td>
        <td style='width: 75%'>${row['associated']}</td>
    </tr>
    
</table>
";
?>
