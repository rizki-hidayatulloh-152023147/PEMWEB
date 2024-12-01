<?php
include "koneksi.php";

if (isset($_POST['submit'])) {
    $id_anggota = $_POST['id_anggota'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];

    // Query untuk mengupdate data anggota
    $query = "UPDATE anggota SET 
              nama = ?, 
              alamat = ?, 
              no_telepon = ?
              WHERE id_anggota = ?";

    // Prepared statement untuk keamanan
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "sssi", $nama, $alamat, $no_telepon, $id_anggota);

    if (mysqli_stmt_execute($stmt)) {
        echo "<div class='alert alert-success text-center'>
                Data berhasil diupdate!
              </div>";
        echo "<script>setTimeout(function() { window.location.href = 'index.php'; }, 1500);</script>";
    } else {
        echo "<div class='alert alert-danger text-center'>
                Gagal mengupdate data!
              </div>";
    }

    mysqli_stmt_close($stmt);
}

// Ambil data yang akan diedit
if (isset($_GET['id'])) {
    $id_anggota = $_GET['id'];
    $query = "SELECT * FROM anggota WHERE id_anggota = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "i", $id_anggota);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
}

// Pastikan data tersedia sebelum digunakan
if (!$data) {
    echo "<div class='alert alert-danger text-center'>
            Data tidak ditemukan.
          </div>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anggota Data</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Edit Anggota Data</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <input type="hidden" name="id_anggota" value="<?php echo $data['id_anggota']; ?>">

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" 
                                   value="<?php echo htmlspecialchars($data['nama']); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control" 
                                   value="<?php echo htmlspecialchars($data['alamat']); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="no_telepon">No Telepon</label>
                            <input type="text" name="no_telepon" id="no_telepon" class="form-control" 
                                   value="<?php echo htmlspecialchars($data['no_telepon']); ?>" required>
                        </div>

                        <button type="submit" name="submit" class="btn btn-success btn-block">
                            Update
                        </button>
                        <a href="index.php" class="btn btn-secondary btn-block">Kembali</a>
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
