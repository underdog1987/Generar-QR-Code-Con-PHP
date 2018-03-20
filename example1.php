 <?php

    require_once 'phpqrcode/qrlib.php';
    
    $content="Este es el texto que espero leas con mucha atencion";
    
    // QRCode::png($contenido, $archivo, $ecc,$tamaño,$margen);
    QRcode::png(
        $content        //Contenido
        ,"example1.png" // Nombre del archivo
        ,QR_ECLEVEL_Q   // Indice de corrección de errores
                        //  L = 7%
                        //  M = 15%
                        //  Q = 25%
                        //  H = 30%
        ,15              // Tamaño en pixeles de cada cuadro que conforma el QR
        ,2              // Margen en unidades "Tamaño".
    );
?>
<html>
	<head>
		<title>QR Example 1</title>
	</head>
	<body bgcolor="#33699">
		<h1>Mi Código QR</h1>
		<img src="example1.png" />
	</body>
</html>