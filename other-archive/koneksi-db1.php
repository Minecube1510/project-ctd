<?php
function db_connect() {
    $host = "sql107.infinityfree.com";
    $user = "if0_38951505";        // ganti kalau bukan root
    $pass = "PE5m59WuZWSS";            // isi sesuai password MySQL kamu
    $dbname = "if0_38951505_ctd";

    $conn = new mysqli($host, $user, $pass, $dbname);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    return $conn;
}
?>


