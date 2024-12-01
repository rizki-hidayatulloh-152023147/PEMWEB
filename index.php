<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PERPUSTAKAAN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .nav-item .nav-link {
            color: #333;
            padding: 1rem;
            transition: all 0.3s ease;
        }
        
        .nav-item .nav-link:hover {
            background-color: #f8f9fa;
            transform: translateY(-3px);
        }
        
        .dashboard-card {
            transition: all 0.3s ease;
            border: none;
            height: 100%;
        }
        
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1) !important;
        }

        .card-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .icon-circle {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
        }

        .bg-soft-primary {
            background-color: rgba(13, 110, 253, 0.1);
        }

        .bg-soft-success {
            background-color: rgba(25, 135, 84, 0.1);
        }

        .bg-soft-warning {
            background-color: rgba(255, 193, 7, 0.1);
        }

        .bg-soft-info {
            background-color: rgba(13, 202, 240, 0.1);
        }
    </style>
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-book-reader me-2"></i>
                Perpustakaan nich
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">
                            <i class="fas fa-home me-1"></i>
                            Home
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i>
                            <?=  $_SESSION['username'] ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">

                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-5">
        <div class="row g-4">
            <!-- Books Card -->
            <div class="col-md-6 col-lg-3">
                <a href="buku.php" class="text-decoration-none">
                    <div class="card dashboard-card shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="icon-circle bg-soft-primary">
                                <i class="fas fa-book text-primary card-icon"></i>
                            </div>
                            <h5 class="card-title mt-3 text-dark">Data Buku</h5>
                            <p class="card-text text-muted">
                                Kelola data buku perpustakaan
                            </p>
                            <div class="mt-3 text-primary">
                                Lihat Detail <i class="fas fa-arrow-right ms-1"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Members Card -->
            <div class="col-md-6 col-lg-3">
                <a href="anggota.php" class="text-decoration-none">
                    <div class="card dashboard-card shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="icon-circle bg-soft-success">
                                <i class="fas fa-users text-success card-icon"></i>
                            </div>
                            <h5 class="card-title mt-3 text-dark">Data Anggota</h5>
                            <p class="card-text text-muted">
                                Kelola data anggota perpustakaan
                            </p>
                            <div class="mt-3 text-success">
                                Lihat Detail <i class="fas fa-arrow-right ms-1"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Loans Card -->
            <div class="col-md-6 col-lg-3">
                <a href="peminjaman.php" class="text-decoration-none">
                    <div class="card dashboard-card shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="icon-circle bg-soft-warning">
                                <i class="fas fa-hand-holding-heart text-warning card-icon"></i>
                            </div>
                            <h5 class="card-title mt-3 text-dark">Data Peminjaman</h5>
                            <p class="card-text text-muted">
                                Kelola transaksi peminjaman
                            </p>
                            <div class="mt-3 text-warning">
                                Lihat Detail <i class="fas fa-arrow-right ms-1"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Staff Card -->
            <div class="col-md-6 col-lg-3">
                <a href="tampil.php" class="text-decoration-none">
                    <div class="card dashboard-card shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="icon-circle bg-soft-info">
                                <i class="fas fa-user-tie text-info card-icon"></i>
                            </div>
                            <h5 class="card-title mt-3 text-dark">Data Staff</h5>
                            <p class="card-text text-muted">
                                Kelola data staff perpustakaan
                            </p>
                            <div class="mt-3 text-info">
                                Lihat Detail <i class="fas fa-arrow-right ms-1"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="row mt-5">
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Statistik Cepat</h5>
                        <div class="row g-4">
                            <div class="col-md-3">
                                <div class="d-flex align-items-center">
                                    <div class="p-3 bg-soft-primary rounded">
                                        <i class="fas fa-book text-primary"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-0">Total Buku</h6>
                                        <h4 class="mb-0">
                                            <?php
                                            include 'koneksi.php';
                                            $query = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM buku");
                                            $data = mysqli_fetch_assoc($query);
                                            echo number_format($data['total']);
                                            ?>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex align-items-center">
                                    <div class="p-3 bg-soft-success rounded">
                                        <i class="fas fa-users text-success"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-0">Total Anggota</h6>
                                        <h4 class="mb-0">
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM anggota");
                                            $data = mysqli_fetch_assoc($query);
                                            echo number_format($data['total']);
                                            ?>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex align-items-center">
                                    <div class="p-3 bg-soft-warning rounded">
                                        <i class="fas fa-hand-holding-heart text-warning"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-0">Peminjaman Aktif</h6>
                                        <h4 class="mb-0">
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM peminjaman WHERE status='dipinjam'");
                                            $data = mysqli_fetch_assoc($query);
                                            echo number_format($data['total']);
                                            ?>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex align-items-center">
                                    <div class="p-3 bg-soft-warning rounded">
                                        <i class="fas fa-hand-holding-heart text-warning"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-0">status pengembalian</h6>
                                        <h4 class="mb-0">
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM peminjaman WHERE status='dikembalikan'");
                                            $data = mysqli_fetch_assoc($query);
                                            echo number_format($data['total']);
                                            ?>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex align-items-center">
                                    <div class="p-3 bg-soft-info rounded">
                                        <i class="fas fa-user-tie text-info"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-0">Total Staff</h6>
                                        <h4 class="mb-0">
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM staff");
                                            $data = mysqli_fetch_assoc($query);
                                            echo number_format($data['total']);
                                            ?>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>