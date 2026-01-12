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
$password_verified = false;
$password_error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['verify_password'])) {
    $input_password = $_POST['password'];
    $hashed_input = md5($input_password);
    
    if ($hashed_input === $row['password']) {
        $password_verified = true;
    } else {
        $password_error = "Password salah! Silakan coba lagi.";
    }
}

closeConnection($conn);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesan - TK Muslimat NU Wanarejan Utara</title>
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
                    
                    <?php if (!$password_verified): ?>
                        <div class="card">
                            <div class="card-header bg-warning text-dark">
                                <h5 class="mb-0"><i class="fas fa-lock"></i> Verifikasi Password</h5>
                            </div>
                            <div class="card-body">
                                <p>Untuk mengedit pesan ini, masukkan password yang Anda buat saat mengirim pesan.</p>
                                
                                <?php if (!empty($password_error)): ?>
                                    <div class="alert alert-danger">
                                        <i class="fas fa-exclamation-circle"></i> <?php echo $password_error; ?>
                                    </div>
                                <?php endif; ?>
                                
                                <form method="POST">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" id="password" name="password" required autofocus>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <button type="submit" name="verify_password" class="btn btn-warning">
                                            <i class="fas fa-key"></i> Verifikasi
                                        </button>
                                        <a href="guestbook.php" class="btn btn-secondary">
                                            <i class="fas fa-arrow-left"></i> Kembali
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    
                    <?php else: ?>
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                <h5 class="mb-0"><i class="fas fa-edit"></i> Edit Pesan</h5>
                            </div>
                            <div class="card-body">
                                <form action="update.php" method="POST" id="editForm">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                     <input type="hidden" name="password" value="<?php echo $_POST['password']; ?>">
                                    
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nama" name="nama" 
                                               value="<?php echo htmlspecialchars($row['nama']); ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email" 
                                               value="<?php echo htmlspecialchars($row['email']); ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="pesan" class="form-label">Pesan / Testimoni <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="pesan" name="pesan" rows="5" required><?php echo htmlspecialchars($row['pesan']); ?></textarea>
                                    </div>

                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-save"></i> Simpan Perubahan
                                        </button>
                                        <a href="guestbook.php" class="btn btn-secondary">
                                            <i class="fas fa-times"></i> Batal
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                    
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
        document.getElementById('editForm')?.addEventListener('submit', function(e) {
            var nama = document.getElementById('nama').value.trim();
            var email = document.getElementById('email').value.trim();
            var pesan = document.getElementById('pesan').value.trim();

            if (nama.length < 3) {
                alert('Nama harus minimal 3 karakter!');
                e.preventDefault();
                return false;
            }

            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert('Format email tidak valid!');
                e.preventDefault();
                return false;
            }

            if (pesan.length < 10) {
                alert('Pesan harus minimal 10 karakter!');
                e.preventDefault();
                return false;
            }

            return true;
        });
    </script>
</body>
</html>