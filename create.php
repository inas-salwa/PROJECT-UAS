<?php

require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $conn = getConnection();
    
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $pesan = trim($_POST['pesan']);
    $password = $_POST['password'];
    
    $errors = [];
    
    
    if (strlen($nama) < 3) {
        $errors[] = "Nama harus minimal 3 karakter!";
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid!";
    }
    
    if (strlen($pesan) < 10) {
        $errors[] = "Pesan harus minimal 10 karakter!";
    }

    if (strlen($password) < 6) {
        $errors[] = "Password harus minimal 6 karakter!";
    }

    if (count($errors) > 0) {
        echo "<!DOCTYPE html>
        <html lang='id'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Error - Validasi Gagal</title>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
        </head>
        <body>
            <div class='container mt-5'>
                <div class='alert alert-danger'>
                    <h4><i class='fas fa-exclamation-triangle'></i> Error Validasi!</h4>
                    <ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>
                    <a href='guestbook.php' class='btn btn-primary'>Kembali ke Form</a>
                </div>
            </div>
        </body>
        </html>";
        exit;
    }
    
    $hashed_password = md5($password);
    
    $nama = $conn->real_escape_string($nama);
    $email = $conn->real_escape_string($email);
    $pesan = $conn->real_escape_string($pesan);
    
    $query = "INSERT INTO guestbook (nama, email, pesan, password, created_at) 
              VALUES ('$nama', '$email', '$pesan', '$hashed_password', NOW())";
    
    if ($conn->query($query) === TRUE) {
        $_SESSION['success'] = "Pesan berhasil dikirim!";
        header("Location: guestbook.php?success=1");
        exit;
    } else {
        echo "<!DOCTYPE html>
        <html lang='id'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Error - Gagal Menyimpan</title>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
        </head>
        <body>
            <div class='container mt-5'>
                <div class='alert alert-danger'>
                    <h4><i class='fas fa-exclamation-triangle'></i> Error Database!</h4>
                    <p>Gagal menyimpan data: " . $conn->error . "</p>
                    <a href='guestbook.php' class='btn btn-primary'>Kembali ke Form</a>
                </div>
            </div>
        </body>
        </html>";
    }
    
    closeConnection($conn);
    
} else {
    header("Location: guestbook.php");
    exit;
}
?>