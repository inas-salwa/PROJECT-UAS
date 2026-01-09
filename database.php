<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'school_guestbook');

function getConnection() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    IF ($conn->connect_error) {
        die("koneksi database gagal: " . $conn->connect_error);
    }

    $conn->set_charset("utf8");

    return$conn;
}

function  closeConnection($conn) {
    if ($conn) {
        $conn->close();
    }
}
?>