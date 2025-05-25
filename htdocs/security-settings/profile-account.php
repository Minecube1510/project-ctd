
<?php

/* [profile-account.php] */


/* Masukkan koneksi, menyambungkan ke 'MySQL-PHPMyAdmin' */
require_once ("koneksi-db.php"); // Ganti require dengan require_once
$konek = db_connect(); // Hubungkan koneksi


// Memulai SESSION
session_start();
// Periksa apakah session ada
if (!(isset($_SESSION['userctd_name']))) {
    // Jika tidak ada session, redirect ke login
    header("Location: /");
    exit;
}
///
$nem_profil = ($_SESSION['userctd_name']);


/* Sistem: [Show Profile] - READ */
// Daftar field yang akan diambil
$fields = [
    "name", "forename", "backname", "roleuser", "level", "user_desc", "datebirth", "nophone", "email", "password"
];

$profil_data = [];

// Loop untuk menjalankan kueri
foreach ($fields as $field) {
    $query = "SELECT $field FROM ctd_account WHERE forename = ?";
    $get_logacc = ($konek) -> prepare($query);
    $get_logacc -> bind_param(("s"), ($nem_profil));
    $get_logacc -> execute();
    $result_logacc = ($get_logacc) -> get_result();
    $profil_data[$field] = ((($result_logacc) -> fetch_assoc()[$field]) ?? (null));
    $get_logacc -> close();
}

// Cetak data sebagai array untuk digunakan dengan []
//print_r($profil_data);
/* Sistem: [Show Profile] - READ */


/* Tutup statement dan koneksi */
//($daftar_tl) -> close();
//($konek) -> close();
?>
