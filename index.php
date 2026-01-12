<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - sistem informasi sekolah</title>

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

      <link rel="stylesheet" href="assets/css/style.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="index.php">
            <i class="fas fa-school me-2"></i>
            TK Muslimat NU Wanarejan Utara
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link active fw-semibold" href="index.php">Home</a>
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
                    <a class="nav-link" href="guestbook.php">
                        Buku Tamu
                    </a>
                </li>
            </ul>
        </div>

    </div>
</nav>


    <section class="section glass-bg">
        <div class="container">
            <h1>Selamat Datang di TK Muslimat NU Wanarejan Utara</h1>
            <p class="lead">Membentuk Generasi Cerdas, Berkarakter, dan Berprestasi</p>
            <a href="guestbook.php" class="btn btn-light btn-lg">
                <i class="fas fa-pen"></i> Tulis di Buku Tamu
            </a>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fas fa-user fa-3x text-primary mb-3"></i>
                            <h5 class="card-title">Profile Sekolah</h5>
                            <p class="card-text">Kenali lebih dekat visi, misi, dan sejarah sekolah kami</p>
                            <a href="about.php" class="btn btn-primary btn-sm">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fas fa-trophy fa-3x text-warning mb-3"></i>
                            <h5 class="card-title">Prestasi</h5>
                            <p class="card-text">Lihat berbagai prestasi yang telah diraih siswa-siswi kami.</p>
                            <a href="prestasi.php" class="btn btn-primary btn-sm">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fas fa-images fa-3x text-success mb-3"></i>
                            <h5 class="card-title">Galeri</h5>
                            <p class="card-text">Dokumentasi Kegiatan Sekolah kami</p>
                            <a href="gallery.php" class="btn btn-primary btn-sm">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="mb-4">Tentang Kami</h2>
                    <p>TK Muslimat NU Wanarejan Utara adalah sekolah unggulan yang berkomitmen untuk memberikan pendidikan berkualitas tinggi. Dengan tenanga pengajar profesional dan fasilitas modern, kami siap membentuk generasi masa depan yang cerdas dan berkarakter</p>
                    <p>Kami menyediakan berbagai program akademik untuk mengembangkan potensi siswa secara maksimal.</p>
                    <a href="about.php" class="btn btn-primary">Pelajari Lebih Lanjut</a>
                </div>
                <div class="col-md-6">
                    <img src="assets\img\gedung sekolah.jpg" alt="Sekolah" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <section class="section text-center">
        <div class="container">
            <h2 class="mb-4">Ingin Berbagi Pendapat?</h2>
            <p class="lead mb-4">Tulis Kesan, saran, atau pertanyaan Anda di buku tamu Kami</p>
            <a href="guestbook.php" class="btn btn-primary btn-lg">
                <i class="fas fa-comments"></i> Buka Buku Tamu
            </a>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2025 TK Muslimat NU Wanarejan Utara. All rights Reserved.
                <a href="#" class="text-white me-3"><i class=" fab fa-facebook"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white"><i class="fab fa-youtube"></i></a>
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
