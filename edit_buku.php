<?php
include "koneksi.php";

if (isset($_POST['submit'])) {
    $id_buku = $_POST['id_buku'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];

    // Updated SQL query to include kategori and stok
    $query = "UPDATE buku SET 
              judul = ?, 
              penulis = ?, 
              penerbit = ?, 
              kategori = ?, 
              stok = ?
              WHERE id_buku = ?";

    // Prepared statement for security
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "sssssi", $judul, $penulis, $penerbit, $kategori, $stok, $id_buku);

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

// Fetch data to be edited
if (isset($_GET['id'])) {
    $id_buku = $_GET['id'];
    $query = "SELECT * FROM buku WHERE id_buku = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "i", $id_buku);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit buku Data</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Edit buku Data</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <input type="hidden" name="id_buku" value="<?php echo $data['id_buku']; ?>">

                        <div class="form-group">
                            <label for="judul">judul</label>
                            <input type="text" name="judul" id="judul" class="form-control" 
                                   value="<?php echo htmlspecialchars($data['judul']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="penulis">penulis</label>
                            <input type="text" name="penulis" id="penulis" class="form-control" 
                                   value="<?php echo htmlspecialchars($data['penulis']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="penerbit">penerbit</label>
                            <input type="penerbit" name="penerbit" id="penerbit" class="form-control" 
                                   value="<?php echo htmlspecialchars($data['penerbit']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="kategori">kategori</label>
                            <input type="text" name="kategori" id="kategori" class="form-control" 
                                   value="<?php echo htmlspecialchars($data['kategori']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="stok">stok</label>
                            <input type="text" name="stok" id="stok" class="form-control" 
                                   value="<?php echo htmlspecialchars($data['stok']); ?>" required>
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
