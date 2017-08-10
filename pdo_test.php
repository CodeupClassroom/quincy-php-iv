<?php

require_once 'env.php';

// require the file that creates a database connection object
require_once 'db_connect.php';

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";
