<?php
/* maintenance.php */

//
//
?>


<!--[Ambil File]-->
<?php require ('style-css/main-setup.php'); ?>


<!--[Judul . WAJIB]-->
<title><?php
/* Penjudulan */
require('style-css/generate-title.php');
$judul = ucwords(strtolower('Progress Maintenance'));  // [UBAH DISINI]

/* Pembentukan */
$generaTitle = join(($renketsu), array(($judul), ($app_name)));
echo ($generaTitle);  // Generate!
?></title>


<style>
h1, h2, h3 {
    text-align: center;
}

.konten-perbaik {
    margin: 0 auto;
    width: 70%;
}

</style>


<!--[Main Content . WAJIB]-->
<div class="konten-perbaik">

<h1><i>
Under Construction
</i></h1>

<h3>
Progress Now:
</h3>

<p>
<b>User - Admin</b>:
<br>.
<br>.
<br>Pengerjaan Sekarang: User menjadi Admin
<br><?php echo ('\/'); ?>
<br>Note: ...
<br><?php echo ('/\\'); ?>
<br>Coming Soon: "<b>Searching-an</b>"
</p>

<p><?php
//echo ('Translator Speeches:');
//echo ('[C, R, U, D]');
?>
</p>

</div>
<!--[?]-->
