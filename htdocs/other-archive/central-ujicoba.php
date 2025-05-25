<?php
// central-ujicoba.php

// Include koneksi database
require_once('koneksi-db.php');
$konek = db_connect();

// Cek apakah metode yang digunakan POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "⚠️ Metode tidak valid. Silakan kirim melalui formulir.";
    exit;
}

// Ambil data dari form
$nama     = trim($_POST['nama_pengguna'] ?? '');
$tanggal  = trim($_POST['lahir_ctd'] ?? '');
$telepon  = trim($_POST['phone_ctd'] ?? '');
$email    = trim($_POST['email_ctd'] ?? '');
$password = trim($_POST['sandi_ctd'] ?? '');

	


// Validasi awal
if (empty($nama) || empty($tanggal) || empty($telepon) || empty($email) || empty($password)) {
    echo "❌ Semua kolom wajib diisi!";
    exit;
}

// Sanitasi dan proteksi tambahan
$nama     = htmlspecialchars($nama, ENT_QUOTES, 'UTF-8');
$telepon  = htmlspecialchars($telepon, ENT_QUOTES, 'UTF-8');
$email    = filter_var($email, FILTER_SANITIZE_EMAIL);
$tanggal  = date('Y-m-d', strtotime($tanggal)); // Format ke DATE
$password_hash = password_hash($password, PASSWORD_DEFAULT); // Enkripsi password

// Cek apakah email sudah terdaftar
$stmt = $konek->prepare("SELECT id FROM akun_ujicoba WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "❌ Email sudah terdaftar. Gunakan email lain.";
    exit;
}
$stmt->close();
//id	nama	tanggal_lahir	telepon	email	sandi	dibuat_pada
// Simpan ke database
$stmt = $konek->prepare("INSERT INTO akun_ujicoba (nama, tanggal_lahir, telepon, email, sandi) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $nama, $tanggal, $telepon, $email, $password_hash);

if ($stmt->execute()) {
    echo "✅ Data berhasil disimpan.";
    // header("Location: login.php?register=success");
    // exit;
} else {
    echo "❌ Gagal menyimpan data: " . $stmt->error;
}

//if ($stmt->execute()) {
  //  $stmt->close();
    //header("Location: login.php?register=success");
    //exit;
//} else {
  //  echo "❌ Gagal menyimpan data: " . $stmt->error;
    //$stmt->close();
    //exit;
//}
?>
