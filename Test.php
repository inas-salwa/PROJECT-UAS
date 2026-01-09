<?php
require_once 'database.php';

$conn = getConnection();

if ($conn) {
    echo "Koneksi databse Berhasil";
} else {
    echo "Koneksi database gagal";
}

closeConnection($conn);
?>