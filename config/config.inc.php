<?php

    define("DB_TYPE", "MySQL"); // MySQL & SQLite
    define("DB_HOST", "localhost");
    define("DB_USERNAME", "root");
    define("DB_PASSWORD", "1234567");
    // define("DB_USERNAME", "root");
    // define("DB_PASSWORD", "");
    define("DB_NAME", "srs");

    define("DB_DNS_MYSQL", "mysql:host=" . DB_HOST . "; dbname=" . DB_NAME);
    define("DB_DNS_SQLITE", "sqlite:db/sqlite_file");


    // define("DB_PREFIX", "face_detection");
?>