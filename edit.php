<?php
include "koneksi.php";

if (isset($_POST['submit'])) {
    $id_staff = $_POST['id_staff'];
    $nama = $_POST['Nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $jabatan = $_POST['jabatan'];
    $no_telepon = $_POST['no_telepon'];

    // Updated SQL query to include jabatan and no_telepon
    $query = "UPDATE staff SET 
              Nama = ?, 
              username = ?, 
              password = ?, 
              jabatan = ?, 
              no_telepon = ?
              WHERE id_staff = ?";

    // Prepared statement for security
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "sssssi", $nama, $username, $password, $jabatan, $no_telepon, $id_staff);

    if (mysqli_stmt_execute($stmt)) {
        echo "<div class='alert alert-success text-center'>
                Data berhasil diupdate!
              </div>";
        echo "<script>setTimeout(function() { window.location.href = 'tampil.php'; }, 1500);</script>";
    } else {
        echo "<div class='alert alert-danger text-center'>
                Gagal mengupdate data!
              </div>";
    }

    mysqli_stmt_close($stmt);
}

// Fetch data to be edited
if (isset($_GET['id'])) {
    $id_staff = $_GET['id'];
    $query = "SELECT * FROM staff WHERE id_staff = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "i", $id_staff);
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
    <title>Edit Staff Data</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Edit Staff Data</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <input type="hidden" name="id_staff" value="<?php echo $data['id_staff']; ?>">

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="Nama" id="Nama" class="form-control" 
                                   value="<?php echo htmlspecialchars($data['Nama']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" 
                                   value="<?php echo htmlspecialchars($data['username']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" 
                                   value="<?php echo htmlspecialchars($data['password']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" name="jabatan" id="jabatan" class="form-control" 
                                   value="<?php echo htmlspecialchars($data['jabatan']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="no_telepon">No Telepon</label>
                            <input type="text" name="no_telepon" id="no_telepon" class="form-control" 
                                   value="<?php echo htmlspecialchars($data['no_telepon']); ?>" required>
                        </div>

                        <button type="submit" name="submit" class="btn btn-success btn-block">
                            Update
                        </button>
                        <a href="tampil.php" class="btn btn-secondary btn-block">Kembali</a>
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
