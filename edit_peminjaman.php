<?php
include "koneksi.php";

if (isset($_POST['submit'])) {
    $id_peminjaman = $_POST['id_peminjaman'];
    $id_anggota = $_POST['id_anggota'];
    $id_buku = $_POST['id_buku'];
    $id_staff = $_POST['id_staff'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $status = $_POST['status'];

    // Update SQL query with correct syntax
    $query = "UPDATE peminjaman SET 
              id_anggota = ?, 
              id_buku = ?, 
              id_staff = ?, 
              tanggal_pinjam = ?, 
              tanggal_kembali = ?, 
              status = ?
              WHERE id_peminjaman = ?";

    // Prepared statement for security
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "ssssssi", $id_anggota, $id_buku, $id_staff, $tanggal_pinjam, $tanggal_kembali, $status, $id_peminjaman);

    if (mysqli_stmt_execute($stmt)) {
        echo "<div class='alert alert-success text-center'>
                Data berhasil diupdate!
              </div>";
        echo "<script>setTimeout(function() { window.location.href = 'peminjaman.php'; }, 1500);</script>";
    } else {
        echo "<div class='alert alert-danger text-center'>
                Gagal mengupdate data!
              </div>";
    }

    mysqli_stmt_close($stmt);
}

// Fetch data to be edited
if (isset($_GET['id'])) {
    $id_peminjaman = $_GET['id'];
    $query = "SELECT * FROM peminjaman WHERE id_peminjaman = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "i", $id_peminjaman);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Peminjaman Data</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Edit Peminjaman Data</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <input type="hidden" name="id_peminjaman" value="<?php echo htmlspecialchars($data['id_peminjaman'] ?? ''); ?>">

                        <div class="form-group">
                            <label for="id_anggota">No anggota</label>
                            <input type="text" name="id_anggota" id="id_anggota" class="form-control" 
                                   value="<?php echo htmlspecialchars($data['id_anggota'] ?? ''); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="id_buku">No Buku</label>
                            <input type="text" name="id_buku" id="id_buku" class="form-control" 
                                   value="<?php echo htmlspecialchars($data['id_buku'] ?? ''); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="id_staff">No staff</label>
                            <input type="text" name="id_staff" id="id_staff" class="form-control" 
                                   value="<?php echo htmlspecialchars($data['id_staff'] ?? ''); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_pinjam">Tanggal Peminjaman Buku</label>
                            <input type="text" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" 
                                   value="<?php echo htmlspecialchars($data['tanggal_pinjam'] ?? ''); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_kembali">Tanggal Kembali</label>
                            <input type="text" name="tanggal_kembali" id="tanggal_kembali" class="form-control" 
                                   value="<?php echo htmlspecialchars($data['tanggal_kembali'] ?? ''); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-select" id="status" name="status">
                                    <option value="Dipinjam">Dipinjam</option>
                                    <option value="Dikembalikan">Dikembalikan</option>
                                </select>
                        </div>

                        <button type="submit" name="submit" class="btn btn-success btn-block">
                            Update
                        </button>
                        <a href="peminjaman.php" class="btn btn-secondary btn-block">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
