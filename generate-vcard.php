<?php

/*
 Lista completa de campos que se pueden incluir en un vCard (este ejemplo usa la V3.0)
 https://en.wikipedia.org/wiki/VCard
 http://www.evenx.com/vcard-3-0-format-specification
 */

require_once 'phpqrcode/qrlib.php';

// Generar vCard
$vcard = "BEGIN:VCARD\r\nVERSION:3.0\r\n
N:1987;Underdog\r\n
FN:Underdog1987\r\n
ORG:Empresa XYZ S.A. de C.V.\r\n
TITLE:IT Researcher\r\n
TEL;TYPE=work,voice:+525512345678\r\n
TEL;TYPE=cell,voice:+525512345678\r\n
TEL;TYPE=work,fax:+525512345678\r\n
URL;TYPE=work:https://youtube.com/user/underdog1987\r\n
EMAIL;TYPE=internet,pref:underdog1987@example.com\r\n
REV:" . date('Ymd') . "T195243Z\r\n
END:VCARD";

if(!extension_loaded("GD")){
    die('<html><body><p>No está habilitada la extension GD</p></body></html>');
}

// Generar QR y guardarlo en un archivo
QRcode::png(
            $vcard          // Contenido
            ,"QRLogo.png"   // Nombre del archivo
            ,QR_ECLEVEL_Q   // Indice de corrección de errores
            ,5              // Tamaño en pixeles de cada cuadro que conforma el QR
            ,1              // Margen en unidades "Tamaño".
        );

// Añadir logo

$originalQR=@imagecreatefrompng("QRLogo.png");
if (FALSE===$originalQR){
    // Error al leer el QR generado
    die('<html><body><img alt="QR" src="QRLogo.png"></body></html>'); // Mostramos QR sin logo
}
$logoYT=@imagecreatefrompng("YT.png");
if (FALSE===$logoYT){
    // Error al leer el logo de YT
    die('<html><body><img alt="QR" src="QRLogo.png"></body></html>'); // Mostramos QR sin logo
}
$dataQR=getimagesize("QRLogo.png");
$dataYT=getimagesize("YT.png");

list($width, $height) = getimagesize("QRLogo.png");
list($ytwidth, $ytheight) = getimagesize("YT.png");

$newQR = imagecreatetruecolor($width, $height);

imagecopy(  $newQR // Pegar en
            ,$originalQR // Pegar desde
            ,0 // Destino X
            ,0 // Destino Y
            ,0 // X Origen (copiar desde esta coordenada)
            ,0 // Y Origen (copiar desde esta coordenada)
            ,$width // Ancho de la imagen que se va a pegar
            ,$height // Alto de la imagen que se va a pegar
        );

imagecopy(  $newQR // Pegar en
            ,$logoYT // Pegar desde
            ,($width/2)-($ytwidth/2)
            ,($height/2)-($ytheight/2)
            ,0
            ,0
            ,$ytwidth
            ,$ytheight
        );

imagepng($newQR,"QRConLogo.png",0);


?>
<html>
	<body bgcolor="#336699">
		<!-- <img alt="QR" src="QRLogo.png">  -->
		<hr /><center>
		<img alt="QR Con Logo" src="QRConLogo.png"></center>
	</body>
</html>