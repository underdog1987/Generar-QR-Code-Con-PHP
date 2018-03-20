<?php

require_once 'phpqrcode/qrlib.php';

$t= urldecode($_REQUEST['txTel']);
$s=urldecode($_REQUEST['txSMS']);

QRcode::png("SMSTO:".$t.":".$s);
?>
