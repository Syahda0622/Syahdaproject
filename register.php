<?php
include 'koneksi.php'; // Pakai koneksi yang udah kamu buat di file lain

$nama = $_POST['nama'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$password = $_POST['password'];
$konfirmasi = $_POST['konfirmasi_password'];

// Cek konfirmasi password
if ($password !== $konfirmasi) {
    echo "<script>alert('Konfirmasi password tidak cocok!'); window.location='register.html';</script>";
    exit;
}

// Enkripsi password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Simpan ke DB
$sql = "INSERT INTO pengguna (nama, email, no_hp, password) VALUES ('$nama', '$email', '$no_hp', '$hashed_password')";

if (mysqli_query($conn, $sql)) {
    echo "<script>
        alert('Registrasi berhasil! Silakan login.');
        window.location.href = 'login.html';
    </script>";
} else {
    echo "Gagal: " . mysqli_error($conn);
}
?>