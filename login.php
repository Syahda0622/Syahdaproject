<?php
session_start();
include 'koneksi.php';

$email    = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM pengguna WHERE email='$email'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

if ($data && password_verify($password, $data['password'])) {
    $_SESSION['nama'] = $data['nama'];
    echo "<script>
        alert('Login berhasil!');
        window.location.href = 'beranda.html';
    </script>";
} else {
    echo "<script>
        alert('Email atau password salah!');
        window.location.href = 'forgot_password.html';
    </script>";
}
?>