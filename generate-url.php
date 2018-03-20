<?php

require_once 'phpqrcode/qrlib.php';

$u= urldecode($_REQUEST['uri']);


QRcode::png("".$u);
?>
