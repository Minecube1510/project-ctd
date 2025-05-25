<?php
// [handle-logout.php] //


// Memulai SESSION
session_start();

// Meng-unset SESSION
session_unset();
// Menghancurkan SESSION
session_destroy();

// Menuju
header ("Location: /dashboard-first");
exit;
?>
