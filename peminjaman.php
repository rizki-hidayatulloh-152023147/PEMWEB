<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col">
                <h2 class="mb-4 text-primary">Data Peminjaman</h2>
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <form method="POST" action="tambah_peminjaman.php" class="d-inline">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Tambah Pengguna Baru
                            </button>
                            <a href="index.php" class="btn btn-secondary ms-2">
                                <i class="fas fa-home me-2"></i>Home
                            </a>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <form action="" method="GET" class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari Nomor Peminjaman..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                            <button class="btn btn-outline-primary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <?php if(isset($_GET['search']) && $_GET['search'] != ''): ?>
                            <a href="?" class="btn btn-outline-secondary">
                                <i class="fas fa-times"></i>
                            </a>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col">No Peminjaman</th>
                                <th scope="col">Nama Anggota</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Nama Staff</th>
                                <th scope="col">Tanggal Peminjaman</th>
                                <th scope="col">Tanggal Kembali</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            include 'koneksi.php';
                            
                            $query = "SELECT peminjaman.*, anggota.nama AS nama_anggota, buku.judul AS judul_buku, staff.Nama AS nama_staff
                                      FROM peminjaman
                                      LEFT JOIN anggota ON peminjaman.id_anggota = anggota.id_anggota
                                      LEFT JOIN buku ON peminjaman.id_buku = buku.id_buku
                                      LEFT JOIN staff ON peminjaman.id_staff = staff.id_staff";

                            // Tambahkan kondisi pencarian jika ada
                            if(isset($_GET['search']) && !empty($_GET['search'])) {
                                $search = mysqli_real_escape_string($koneksi, $_GET['search']);
                                $query .= " WHERE peminjaman.id_peminjaman LIKE '%$search%'";
                            }

                            $data = mysqli_query($koneksi, $query);
                            $no = 1;
                            
                            if(mysqli_num_rows($data) > 0) {
                                while($d = mysqli_fetch_array($data)){
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $no++; ?></td>
                                <td><?php echo $d['id_peminjaman']; ?></td>
                                <td><?php echo $d['nama_anggota']; ?></td>
                                <td><?php echo $d['judul_buku']; ?></td>
                                <td><?php echo $d['nama_staff']; ?></td>
                                <td><?php echo $d['tanggal_pinjam']; ?></td>
                                <td><?php echo $d['tanggal_kembali']; ?></td>
                                <td><?php echo $d['status']; ?></td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="edit_peminjaman.php?id=<?php echo $d['id_peminjaman']; ?>" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit me-1"></i>Edit
                                        </a>
                                        <a href="hapus_peminjaman.php?id=<?php echo $d['id_peminjaman']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            <i class="fas fa-trash me-1"></i>Hapus
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php 
                                }
                            } else {
                        ?>
                            <tr>
                                <td colspan="9" class="text-center py-4">
                                    <div class="alert alert-info mb-0">
                                        <?php echo isset($_GET['search']) ? "Tidak ada data peminjaman dengan nomor \"" . htmlspecialchars($_GET['search']) . "\"" : "Tidak ada data peminjaman"; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>