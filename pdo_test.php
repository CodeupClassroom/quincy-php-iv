<?php

require_once 'park_logins.php';

// require the file that creates a database connection object
require_once 'db_connect.php';

echo $connection->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";
