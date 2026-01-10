<?php
require_once 'config/database.php';

$conn = getConnection();

$query = "SELECT * FROM guestbook ORDER BY created_at DESC";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu - TK Muslimat NU Wanarejan Utara</title>

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

    <section class="hero">
        <div class="container text-center">
            <h1><i class="fas fa-book"></i> Buku Tamu</h1>
            <p class="lead">Tulis kesan, saran, atau pertanyaan Anda</p>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-pen"></i> Tulis Pesan Baru</h5>
                        </div>
                        <div class="card-body">
                            <form action="create.php" method="POST" id="guestbookForm">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                    <small class="text-muted">Nama akan ditampilkan di buku tamu</small>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                    <small class="text-muted">Email tidak akan ditampilkan</small>
                                </div>

                                <div class="mb-3">
                                    <label for="pesan" class="form-label">Pesan / Testimoni <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="pesan" name="pesan" rows="5" required></textarea>
                                    <small class="text-muted">Minimal 10 karakter</small>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    <small class="text-muted">Password untuk edit/hapus pesan nanti. Minimal 6 karakter.</small>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-paper-plane"></i> Kirim Pesan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="alert alert-info mt-3">
                        <i class="fas fa-info-circle"></i> <strong>Catatan:</strong><br>
                        Simpan password Anda dengan baik. Password diperlukan untuk mengedit atau menghapus pesan Anda nanti.
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0"><i class="fas fa-comments"></i> Daftar Pesan (<?php echo $result->num_rows; ?> Pesan)</h5>
                        </div>
                        <div class="card-body" style="max-height: 600px; overflow-y: auto;">
                            <?php if ($result->num_rows > 0): ?>
                                <?php while($row = $result->fetch_assoc()): ?>
                                    <div class="guestbook-item">
                                        <div class="guestbook-header">
                                            <div>
                                                <div class="guestbook-name">
                                                    <i class="fas fa-user-circle text-primary"></i> 
                                                    <?php echo htmlspecialchars($row['nama']); ?>
                                                </div>
                                                <div class="guestbook-date">
                                                    <i class="fas fa-clock"></i> 
                                                    <?php 
                                                    $date = new DateTime($row['created_at']);
                                                    echo $date->format('d F Y, H:i'); 
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="guestbook-message">
                                            <?php echo nl2br(htmlspecialchars($row['pesan'])); ?>
                                        </div>

                                        <div class="guestbook-actions">
                                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" 
                                               onclick="return confirm('Yakin ingin menghapus pesan ini?')">
                                                <i class="fas fa-trash"></i> Hapus
                                            </a>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <div class="text-center text-muted py-5">
                                    <i class="fas fa-inbox fa-3x mb-3"></i>
                                    <p>Belum ada pesan. Jadilah yang pertama menulis!</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2025 TK Muslimat NU Wanarejan Utara. All Rights Reserved.</p>
            <p>
                <a href="#" class="text-white me-3"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white"><i class="fab fa-youtube"></i></a>
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.getElementById('guestbookForm').addEventListener('submit', function(e) {
            var nama = document.getElementById('nama').value.trim();
            var email = document.getElementById('email').value.trim();
            var pesan = document.getElementById('pesan').value.trim();
            var password = document.getElementById('password').value;

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

            if (password.length < 6) {
                alert('Password harus minimal 6 karakter!');
                e.preventDefault();
                return false;
            }

            return true;
        });
    </script>
</body>
</html>
<?php
closeConnection($conn);
?>