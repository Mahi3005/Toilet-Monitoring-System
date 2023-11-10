<?php
require 'phpqrcode-master/qrlib.php';

$website = 'feedback.php';
QRcode::png($website);
?>


<!DOCTYPE html>
<html>
<head>
  <title>QR Code Generator</title>
</head>
<body>
  <h2>QR Code Generator</h2>
  <form action="https://chart.googleapis.com/chart" method="GET" target="_blank">
    <input type="hidden" name="cht" value="qr">
    <input type="hidden" name="chs" value="300x300">
    <input type="hidden" name="chl" value="feedback.php">
    <input type="submit" value="Generate QR Code">
  </form>
</body>
</html>
