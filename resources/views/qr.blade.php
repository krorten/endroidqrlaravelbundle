<?php
/**
 * Created by PhpStorm.
 * User: jelle
 * Date: 27-12-2016
 * Time: 14:51
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QR code</title>
</head>
<body style="background-color: #34393f">
<img src="@QR(['Text' => '{{ $message }}'])" />
</body>
</html>