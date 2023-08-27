<?php
    $dbHost = getenv("DB_HOST");
    $dbPort = getenv("DB_PORT");
    $dbName = getenv("DB_NAME");
    $dbUser = getenv("DB_USER");
    $dbPassword = getenv("DB_PASSWORD");
    
    $db = pg_connect(
        "host=$dbHost " .
        "port=$dbPort " .
        "dbname=$dbName " .
        "user=$dbUser " .
        "password=$dbPassword"
    );
    
    if (!$db) {
        echo "Error: Unable to connect to PostgreSQL database.\n";
        exit;
    }
    
    // Now you can use the $db connection for database operations
    // For example, executing queries or fetching data
?>
