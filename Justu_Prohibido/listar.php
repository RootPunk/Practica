<?php

include("conexion.php");
		include("lib/dompdf/dompdf_config.inc.php");


$codigoHTML='
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="6" bgcolor="skyblue"><CENTER><strong>REPORTE DE LA TABLA USUARIOS</strong></CENTER></td>
  </tr>
  <tr bgcolor="red">
    <td><strong>CODIGO</strong></td>
    <td><strong>NOMBRE</strong></td>
    <td><strong>APELLIDO</strong></td>
    <td><strong>EDAD</strong></td>
    <td><strong>CORREO</strong></td>
    <td><strong>TELEFONO</strong></td>
    <td><strong>ESTADO</strong></td>
  </tr>';
  


$sql=mysql_query("select * from usuario");
while($res=mysql_fetch_array($sql)){
$codigoHTML.='	
	<tr>
		<td>'.$res['codigo'].'</td>
		<td>'.$res['nombre'].'</td>
		<td>'.$res['apellido'].'</td>
		<td>'.$res['edad'].'</td>
		<td>'.$res['correo'].'</td>
		<td>'.$res['telefono'].'</td>	
        <td>'.$res['Estado'].'</td>	
	</tr>';
	
}
$codigoHTML.='
</table>
</body>
</html>';
$codigoHTML=utf8_encode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Reporte_tabla_usuarios.pdf");
?>