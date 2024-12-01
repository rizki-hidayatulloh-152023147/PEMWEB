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
                <h2 class="mb-4 text-primary">Data Buku</h2>
                <form method="POST" action="tambah_buku.php" class="mb-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Tambah Pengguna Baru
                    </button>
                    <a href="index.php"  class="btn btn-secondary ms-2">
                    <i class="fas fa-home me-2"></i>Home
                </a>
                </form>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col">id buku</th>
                                <th scope="col">judul</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Penerbit</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">stok</th>
                                <th style="align-center" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            include 'koneksi.php';
                            $no = 1;
                            $data = mysqli_query($koneksi,"select * from buku");
                            while($d = mysqli_fetch_array($data)){
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $no++; ?></td>
                                <td><?php echo $d['id_buku']; ?></td>
                                <td><?php echo $d['judul']; ?></td>
                                <td><?php echo $d['penulis']; ?></td>
                                <td><?php echo $d['penerbit']; ?></td>
                                <td><?php echo $d['kategori']; ?></td>
                                <td><?php echo $d['stok']; ?></td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="edit_buku.php?id=<?php echo $d['id_buku']; ?>" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit me-1"></i>Edit
                                        </a>
                                        <a href="hapus_buku.php?id=<?php echo $d['id_buku']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            <i class="fas fa-trash me-1"></i>Hapus
                                        </a>
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