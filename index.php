<?php


?><html>
<head>
	<meta charset="UTF-8">
	<title>Generar código QR con PHP 5</title>
</head>
<body>
	<h2>Generar código QR con PHP</h2>
	<p><strong>Ejemplo 1:</strong> Generar el código con texto plano.</p>
	<form action="generate.php" method="post" target="qr">
		<fieldset>
			<label for="txTexto">Texto a incluir en el QR:</label>
			<input type="text" value="" placeholder="Escribe aquí el texto" id="txTexto" name="txTexto" required />
			<hr />
			<input type="submit" value="Generar QR">
		</fieldset>
	</form>
	<iframe id="qr" name="qr" src="generate.php?txTexto=Suscribete%20a%20mi%20canal%20:)" width="250" height="250" frameborder="0"></iframe>

	<p><strong>Ejemplo 2:</strong> Generar un código con número de teléfono y mostrarlo directamente en el navegador.</p>
	<form action="generate-tel.php" method="post" target="qrcodetel">
		<fieldset>
			<label for="txTelefono">Número de teléfono a incluir en el QR:</label>
			<input type="text" value="" placeholder="Escribe aquí el # de teléfono" id="txTelefono" name="txTelefono" required />
			<hr />
			<input type="submit" value="Generar QR">
		</fieldset>
	</form>
	<iframe id="qrcodetel" name="qrcodetel" src="generate-tel.php?txTelefono=5512345678" width="250" height="250" frameborder="0"></iframe>
	
    <p><strong>Ejemplo 3:</strong> Generar un código con un SMS.</p>
	<form action="generate-sms.php" method="post" target="qrcodesms">
		<fieldset>
			<label for="txTel">Número de teléfono a incluir en el QR:</label>
			<input type="text" value="" placeholder="Escribe aquí el # de teléfono" id="txTel" name="txTel" required />
			<br />
			<label for="txSMS">Mensaje:</label>
			<input type="text" value="" placeholder="Escribe aquí el mensaje" id="txSMS" name="txSMS" required />
			<hr />
			<input type="submit" value="Generar QR">
		</fieldset>
	</form>
	<iframe id="qrcodesms" name="qrcodesms" src="generate-sms.php?txTel=5512345678&txSMS=Este%20es%20el%20mensaje%20secreto%20que%20se%20envia%20en%20el%20SMS" width="250" height="250" frameborder="0"></iframe>
	
	<p><strong>Ejemplo 4:</strong> Generar un código con una URL.</p>
	<form action="generate-url.php" method="post" target="qrcodeuri">
		<fieldset>
			<label for="uri">URL a incluir en el QR:</label>
			<input type="url" value="" placeholder="Escribe aquí la URL" id="uri" name="uri" required />
			<hr />
			<input type="submit" value="Generar QR">
		</fieldset>
	</form>
	<iframe id="qrcodeuri" name="qrcodeuri" src="generate-url.php?uri=https:%2F%2Fyoutube.com%2Fuser%2Funderdog1987%2F" width="250" height="250" frameborder="0"></iframe>

	<p><strong>Ejemplo 5:</strong> Generar una tarjeta de contacto</p>
	<input type="button" value="Ir al formulario para generar tarjeta de contacto" onclick="window.location.href='formvcard.php';" />
</body>
</html>