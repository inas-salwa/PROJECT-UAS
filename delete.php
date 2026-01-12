<?php
require_once 'config/database.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: guestbook.php");
    exit;
}

$id = intval($_GET['id']);

$conn = getConnection();

$query = "SELECT * FROM guestbook WHERE id = $id";
$result = $conn->query($query);

if ($result->num_rows == 0) {
    echo "<!DOCTYPE html>
    <html lang='id'>
    <head>
        <meta charset='UTF-8'>
        <title>Error - Data Tidak Ditemukan</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
    </head>
    <body>
        <div class='container mt-5'>
            <div class='alert alert-danger'>
                <h4>Error!</h4>
                <p>Data tidak ditemukan!</p>
                <a href='guestbook.php' class='btn btn-primary'>Kembali ke Buku Tamu</a>
            </div>
        </div>
    </body>
    </html>";
    closeConnection($conn);
    exit;
}

$row = $result->fetch_assoc();

$delete_error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirm_delete'])) {
    $input_password = $_POST['password'];
    $hashed_input = md5($input_password);
    
    if ($hashed_input === $row['password']) {
        $delete_query = "DELETE FROM guestbook WHERE id = $id";
        
        if ($conn->query($delete_query) === TRUE) {
            closeConnection($conn);
            header("Location: guestbook.php?deleted=1");
            exit;
        } else {
            $delete_error = "Error database: " . $conn->error;
        }
    } else {
        $delete_error = "Password salah! Silakan coba lagi.";
    }
}

closeConnection($conn);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Pesan - TK Muslimat NU Wanarejan Utara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-school"></i> TK Muslimat NU Wanarejan Utara
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="prestasi.php">Prestasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gallery.php">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="guestbook.php">Buku Tamu</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    
                    <div class="card border-danger">
                        <div class="card-header bg-danger text-white">
                            <h5 class="mb-0"><i class="fas fa-trash"></i> Konfirmasi Hapus Pesan</h5>
                        </div>
                        <div class="card-body">
                            
                            <div class="alert alert-warning">
                                <h6><strong>Anda akan menghapus pesan berikut:</strong></h6>
                                <hr>
                                <p><strong>Nama:</strong> <?php echo htmlspecialchars($row['nama']); ?></p>
                                <p><strong>Pesan:</strong></p>
                                <p class="bg-light p-3 rounded"><?php echo nl2br(htmlspecialchars($row['pesan'])); ?></p>
                            </div>
                            
                            <?php if (!empty($delete_error)): ?>
                                <div class="alert alert-danger">
                                    <i class="fas fa-exclamation-circle"></i> <?php echo $delete_error; ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="alert alert-danger">
                                <i class="fas fa-exclamation-triangle"></i> 
                                <strong>Perhatian!</strong> Tindakan ini tidak dapat dibatalkan. Pesan akan dihapus secara permanen.
                            </div>
                            
                            <form method="POST" id="deleteForm">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Masukkan Password untuk Konfirmasi <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="password" name="password" required autofocus>
                                    <small class="text-muted">Password yang Anda gunakan saat mengirim pesan</small>
                                </div>
                                
                                <div class="d-flex gap-2">
                                    <button type="submit" name="confirm_delete" class="btn btn-danger">
                                        <i class="fas fa-trash"></i> Ya, Hapus Pesan
                                    </button>
                                    <a href="guestbook.php" class="btn btn-secondary">
                                        <i class="fas fa-times"></i> Batal
                                    </a>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2025 TK Muslimat NU Wanarejan Utara. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.getElementById('deleteForm').addEventListener('submit', function(e) {
            var password = document.getElementById('password').value;
            
            if (password.length < 6) {
                alert('Password harus minimal 6 karakter!');
                e.preventDefault();
                return false;
            }
            
            if (!confirm('Apakah Anda yakin ingin menghapus pesan ini? Tindakan ini tidak dapat dibatalkan!')) {
                e.preventDefault();
                return false;
            }
            
            return true;
        });
    </script>
</body>
</html>