<?php

require_once 'phpqrcode/qrlib.php';

$t= urldecode($_REQUEST['txTelefono']);

QRcode::png("tel:".$t);
?>
