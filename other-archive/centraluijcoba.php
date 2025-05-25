
<?php
// Koneksi sederhana ke database
$konek = new mysqli("sql107.infinityfree.com", "if0_38951505", "PE5m59WuZWSS", "if0_38951505_ctd");

// Cek koneksi
if ($konek->connect_error) {
    die("Koneksi gagal: " . $konek->connect_error);
}

// Pastikan metode POST
if ($_SERVER["REQUEST_METHOD"] !== "GET") {
    echo "⚠️ Metode tidak valid. Silakan kirim melalui formulir.";
    exit;
}

// Ambil data form
$nama     = $_GET['nama_pengguna'] ?? '';
$tanggal  = $_GET['lahir_ctd'] ?? '';
$telepon  = $_GET['phone_ctd'] ?? '';
$email    = $_GET['email_ctd'] ?? '';
$password = $_GET['sandi_ctd'] ?? '';

// Validasi sederhana
if (!$nama || !$tanggal || !$telepon || !$email || !$password) {
    echo "❌ Semua kolom wajib diisi!";
    exit;
}

// Enkripsi password
//$hash = password_hash($password, PASSWORD_DEFAULT);
$hash = ($password);

// Insert ke database
$sql = "INSERT INTO akun_ujicoba (nama, tanggal_lahir, telepon, email, sandi)
        VALUES ('$nama', '$tanggal', '$telepon', '$email', '$hash')";

if ($konek->query($sql) === TRUE) {
    header("Location: login.php?register=success");
    exit;
} else {
    echo "❌ Gagal menyimpan: " . $konek->error;
}
?>


?>
