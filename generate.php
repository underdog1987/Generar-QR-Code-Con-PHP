<?php

require_once 'phpqrcode/qrlib.php';

$t= urldecode($_REQUEST['txTexto']);

QRcode::png($t);
?>
