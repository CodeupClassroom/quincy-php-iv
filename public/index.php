<?php
require_once "../db_connect.php";

$message = $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        h1 {
            color: red;
            font-size: 5em;
        }
    </style>
</head>
<body>
    <h1><?= $message ?></h1>

</body>
</html>