<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Simulasi: tampilkan pesan kalau "link reset sudah dikirim"
    // Nanti bisa diganti dengan logika kirim email sungguhan
    echo "
    <!DOCTYPE html>
    <html lang='id'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Reset Kata Sandi</title>
        <script src='https://cdn.tailwindcss.com'></script>
    </head>
    <body class='min-h-screen bg-gray-100 flex items-center justify-center'>
        <div class='bg-white p-8 rounded-xl shadow-md max-w-md w-full text-center'>
            <h2 class='text-2xl font-bold mb-4 text-green-600'>Link Reset Dikirim</h2>
            <p class='mb-6 text-gray-700'>
                Jika email <strong>$email</strong> terdaftar, kami telah mengirimkan link untuk mengatur ulang kata sandi Anda.
            </p>
            <a href='LOGIN.html' class='text-blue-500 hover:underline'>Kembali ke Login</a>
        </div>
    </body>
    </html>
    ";
} else {
    // Kalau akses langsung file ini (tanpa submit form)
    header("Location: forgot_password.html");
    exit();
}
?>
