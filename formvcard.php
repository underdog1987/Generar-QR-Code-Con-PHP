<?php

/*
 Lista completa de campos que se pueden incluir en un vCard (este ejemplo usa la V3.0)
 https://en.wikipedia.org/wiki/VCard
 http://www.evenx.com/vcard-3-0-format-specification
 */

require_once 'phpqrcode/qrlib.php';

$showVCard=FALSE;
if(count($_POST)>0){
    // Obtener los datos del formulario
    $txNombre=$_POST['txNombre'];
    $txApellidos=$_POST['txApellidos'];
    $txPuesto=$_POST['txPuesto'];
    $txTelOfi=$_POST['txTelOfi'];
    $txCelOfi=$_POST['txCelOfi'];
    $txFax=$_POST['txFax'];
    $txWeb=$_POST['txWeb'];
    $txCorreo=$_POST['txCorreo'];
    
    // Armar la vCard con los datos recibidos
    $vcard = "BEGIN:VCARD\r\nVERSION:3.0\r\n
N:".$txApellidos.";".$txNombre."\r\n
FN:".$txNombre." ".$txApellidos."\r\n
ORG:Empresa XYZ S.A. de C.V.\r\n
TITLE:".$txPuesto."\r\n
TEL;TYPE=work,voice:".$txTelOfi."\r\n
TEL;TYPE=cell,voice:".$txCelOfi."\r\n
TEL;TYPE=work,fax:".$txFax."\r\n
URL;TYPE=work:".$txWeb."\r\n
EMAIL;TYPE=internet,pref:".$txCorreo."\r\n
REV:" . date('Ymd') . "T195243Z\r\n
END:VCARD";
    
    // Generar nombre único parala imagen vCard
    $fn=microtime(true)."_".base64_encode($txCorreo).".png";
    QRcode::png($vcard,$fn,'H',5,1);
    
}

?><html>
<head>
	<meta charset="UTF-8">
	<title>Generar código QR con PHP 5 || Tarjeta de contacto</title>
</head>
<body>
	<h2>Generar tarjeta de contacto QR con PHP</h2>
	<p><strong>Ejemplo 1:</strong> Generar el código con texto plano.</p>
	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" target="qr">
		<fieldset>
			<label for="txNombre">Nombre:</label>
			<input type="text" value="" placeholder="Nombre" id="txNombre" name="txNombre" required />
			<br />
			<label for="txApellidos">Apellido:</label>
			<input type="text" value="" placeholder="Apellido" id="txApellidos" name="txApellidos" required />
			<br />
			<label for="txPuesto">Puesto:</label>
			<input type="text" value="" placeholder="Puesto" id="txPuesto" name="txPuesto" required />
			<br />
			<label for="txTelOfi">Teléfono de oficina:</label>
			<input type="text" value="" placeholder="Telefono de oficina" id="txTelOfi" name="txTelOfi" required />
			<br />
			<label for="txCelOfi">Celular del trabajo:</label>
			<input type="text" value="" placeholder="Celular del trabajo" id="txCelOfi" name="txCelOfi" required />
			<br />
			<label for="txFax">Fax:</label>
			<input type="text" value="" placeholder="Fax" id="txFax" name="txFax" required />
			<br />
			<label for="txWeb">Sitio Web:</label>
			<input type="url" value="" placeholder="http://" id="txWeb" name="txWeb" required />
			<br />
			<label for="txCorreo">Correo Electrónico:</label>
			<input type="email" value="" placeholder="Correo electrónico" id="txCorreo" name="txCorreo" required />
			<br />
			
			<input type="submit" value="Generar vCard QR">
		</fieldset>
	</form>
	<?php if (isset($fn)){ ?><div>
		<img src="<?php echo $fn ?>" alt="vCard de <?php echo $txNombre." ".$txApellidos?>" />
	</div><?php }?>
	<input type="button" value="Ir al indice" onclick="window.location.href='./';" />
</body>
</html>