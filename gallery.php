<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - TK Muslimat NU Wanarejan Utara</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            margin-bottom: 30px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover {
            transform: scale(1.05);
        }

        .gallery-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 10px;
        }

        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            color: white;
            padding: 20px;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }

        .gallery-item:hover .gallery-overlay {
            transform: translateY(0);
        }

        .gallery-title {
            font-size: 1.1rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .gallery-date {
            font-size: 0.9rem;
            opacity: 0.9;
        }
    </style>
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
                        <a class="nav-link active" href="gallery.php">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="guestbook.php">Buku Tamu</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="container text-center">
            <h1><i class="fas fa-images"></i> Galeri Kegiatan</h1>
            <p class="lead">Dokumentasi Kegiatan dan Fasilitas TK Muslimat NU Wanarejan Utara</p>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h2 class="section-title">Album Foto Kegiatan</h2>
                    <p class="text-muted">Klik pada foto untuk melihat detail</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="https://via.placeholder.com/400x300/667eea/ffffff?text=Upacara+Bendera" alt="Upacara Bendera">
                        <div class="gallery-overlay">
                            <div class="gallery-title">Upacara Bendera</div>
                            <div class="gallery-date"><i class="fas fa-calendar"></i> 17 Agustus 2024</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="https://via.placeholder.com/400x300/764ba2/ffffff?text=Lomba+Mewarnai" alt="Lomba Mewarnai">
                        <div class="gallery-overlay">
                            <div class="gallery-title">Lomba Mewarnai</div>
                            <div class="gallery-date"><i class="fas fa-calendar"></i> 15 Agustus 2024</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="https://via.placeholder.com/400x300/f093fb/ffffff?text=Manasik+Haji" alt="Manasik Haji">
                        <div class="gallery-overlay">
                            <div class="gallery-title">Manasik Haji</div>
                            <div class="gallery-date"><i class="fas fa-calendar"></i> 10 Juli 2024</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="https://via.placeholder.com/400x300/4facfe/ffffff?text=Kelas+Menari" alt="Kelas Menari">
                        <div class="gallery-overlay">
                            <div class="gallery-title">Kelas Menari</div>
                            <div class="gallery-date"><i class="fas fa-calendar"></i> 5 Oktober 2024</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="https://via.placeholder.com/400x300/00f2fe/ffffff?text=Kegiatan+Belajar" alt="Kegiatan Belajar">
                        <div class="gallery-overlay">
                            <div class="gallery-title">Kegiatan Belajar</div>
                            <div class="gallery-date"><i class="fas fa-calendar"></i> 20 September 2024</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="https://via.placeholder.com/400x300/43e97b/ffffff?text=Bermain+Outdoor" alt="Bermain Outdoor">
                        <div class="gallery-overlay">
                            <div class="gallery-title">Bermain Outdoor</div>
                            <div class="gallery-date"><i class="fas fa-calendar"></i> 15 September 2024</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="https://via.placeholder.com/400x300/fa709a/ffffff?text=Perayaan+Hari+Ibu" alt="Perayaan Hari Ibu">
                        <div class="gallery-overlay">
                            <div class="gallery-title">Perayaan Hari Ibu</div>
                            <div class="gallery-date"><i class="fas fa-calendar"></i> 22 Desember 2024</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="https://via.placeholder.com/400x300/fee140/ffffff?text=Field+Trip" alt="Field Trip">
                        <div class="gallery-overlay">
                            <div class="gallery-title">Field Trip ke Kebun Binatang</div>
                            <div class="gallery-date"><i class="fas fa-calendar"></i> 10 November 2024</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="https://via.placeholder.com/400x300/30cfd0/ffffff?text=Wisuda+TK" alt="Wisuda TK">
                        <div class="gallery-overlay">
                            <div class="gallery-title">Wisuda Siswa TK B</div>
                            <div class="gallery-date"><i class="fas fa-calendar"></i> 25 Juni 2024</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="https://via.placeholder.com/400x300/a8edea/ffffff?text=Ruang+Kelas" alt="Ruang Kelas">
                        <div class="gallery-overlay">
                            <div class="gallery-title">Ruang Kelas yang Nyaman</div>
                            <div class="gallery-date"><i class="fas fa-camera"></i> Fasilitas</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="https://via.placeholder.com/400x300/fed6e3/ffffff?text=Perpustakaan" alt="Perpustakaan">
                        <div class="gallery-overlay">
                            <div class="gallery-title">Perpustakaan Mini</div>
                            <div class="gallery-date"><i class="fas fa-camera"></i> Fasilitas</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="https://via.placeholder.com/400x300/c1dfc4/ffffff?text=Area+Bermain" alt="Area Bermain">
                        <div class="gallery-overlay">
                            <div class="gallery-title">Area Bermain Outdoor</div>
                            <div class="gallery-date"><i class="fas fa-camera"></i> Fasilitas</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-light text-center">
        <div class="container">
            <h2 class="mb-4">Tertarik dengan Kegiatan Kami?</h2>
            <p class="lead mb-4">Hubungi kami untuk informasi lebih lanjut atau kunjungi sekolah kami</p>
            <a href="guestbook.php" class="btn btn-primary btn-lg me-2">
                <i class="fas fa-pen"></i> Tulis Pesan
            </a>
            <a href="about.php" class="btn btn-outline-primary btn-lg">
                <i class="fas fa-info-circle"></i> Tentang Kami
            </a>
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
</body>
</html>