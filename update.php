<?php
$koneksi = new mysqli("localhost", "root", "", "akun_login");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$email = $_POST['email'];
$password_baru = $_POST['password_baru'];
$konfirmasi = $_POST['konfirmasi_password'];

// Validasi
if ($password_baru !== $konfirmasi) {
    echo "<script>alert('Konfirmasi password tidak cocok!'); window.history.back();</script>";
    exit();
}

// Hash password
$password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

// Update ke database
$sql = "UPDATE pengguna SET password = '$password_hash' WHERE email = '$email'";
$result = $koneksi->query($sql);

if ($result && $koneksi->affected_rows > 0) {
    echo "<script>alert('Password berhasil diubah!'); window.location.href='LOGIN.html';</script>";
} else {
    echo "<script>alert('Gagal mengubah password. Email tidak ditemukan!'); window.history.back();</script>";
}

$koneksi->close();
?>
