
<html>

<?php
/* [admin-adding.php] */

//
// Memulai SESSION
session_start();

// Periksa apakah session ada
if (!(isset($_SESSION['userctd_name']))) {
    // Jika tidak ada session, redirect ke login
    header("Location: /");
    exit;
}
///
$username_ctd = ($_SESSION['userctd_name']);
?>

<!--[Ambil File]-->
<?php require ('style-css/main-setup.php'); ?>
<?php require_once ("security-settings/koneksi-db.php");
$konek = db_connect();  // Hubungkan koneksi ?>
<?php //include ('namafile.php'); ?>


<!--[Judul . WAJIB]-->
<title><?php
/* Penjudulan */
require('style-css/generate-title.php');
$judul = ucwords(strtolower('Added Account by Admin'));  // [UBAH DISINI]

/* Pembentukan */
$generaTitle = join(($renketsu), array(($judul), ($app_name)));
echo ($generaTitle);  // Generate!
?></title>


<style>
main {
    margin: 0;
    padding-top: 7%;  /* Menyesuaikan dengan tinggi dari Navbar */
}

.ngopas {
    width: max-content;
    pointer-events: auto;  /* Mengaktifkan interaksi */
    user-select: text;  /* Memungkinkan teks untuk diseleksi */
    cursor: text;
}
.ngeblok {
    /* width: max-content; */
    pointer-events: none;
    user-select: none;
}

.ngedit-pribadi {
    display: flex;
    flex-direction: row;
    align-items: center; /* Memastikan elemen sejajar */
    margin: 2% auto;
    width: 100%;
}
.ngedit-pribadi .logsign {
    flex: 1;  /* Label mengambil ruang sesuai proporsi */
    text-align: right;  /* Supaya lebih rapi jika perlu */
    margin-right: 10px;  /* Jarak antara label dan input */
}
.ngedit-pribadi input,
.ngedit-pribadi textarea {
    flex: 2;  /* Input lebih besar dibanding label */
    width: auto;  /* Pastikan ukurannya fleksibel */
    text-align: left;
}
.ngedit-pribadi input {
    transition: 0.3s;
}
.ngedit-pribadi textarea {
    transition: 0.3s;
}

.nampil-prbadi {
    display: flex;
    flex-direction: row;
    align-items: center; /* Memastikan elemen sejajar */
    margin: 2% auto;
    width: 100%;
}
.nampil-nem {
    display: flex;
    justify-content: space-between; /* Sebarkan elemen dengan jarak merata */
    align-items: center; /* Ratakan elemen secara vertikal */
    width: 100%; /* Pastikan kontainer punya lebar penuh */
    margin: 5% 0%;
}

.isi-profilan {
    display: flex;
    flex-direction: column;  /* Menyusun elemen secara vertikal */
    justify-content: center;  /* Memusatkan elemen secara vertikal */
    align-items: center;  /* Memusatkan elemen secara horizontal */
    background: white;
    padding: 20px;
    width: 85%;  /* Lebar container tetap */
    gap: 15px;  /* Jarak antar elemen di dalam container */
}
.ubah-profil {
    display: flex;  /* Use flexbox for alignment */
    flex-direction: column;  /* Menyusun elemen secara vertikal */
    align-items: center;  /* Align items vertically in the middle */
    margin-bottom: 15px;  /* Add some space between groups */
    width: 100%;  /* Ensure the group takes full width within its parent */
    justify-content: center;  /* Center the label and input horizontally */
}
.ubah-profil .logsign {
    display: flex;
    width: 25%;
    font-size: 20px;
    font-weight: bold;
    margin: auto auto auto 1%;
}
.ubah-profil .masukan {
    flex: 2;
    width: 70%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
.ubah-profil textarea {
    flex: 2;
    width: 70%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
.get-jabat {
    display: flex;  /* Susun mendatar */
    flex-direction: row;  /* Pastikan mendatar */
    align-items: center;  /* Sejajar vertikal */
    gap: 5px;  /* Jarak kecil antara radio button dan label */
}
.ter-jabat {
    max-height: 5%;
    max-width: 5%;
    margin: 0%;
}

.ngedit-pilih {
    display: flex;
    margin: 1% auto;
    flex-direction: row;
    gap: 1rem;  /* jarak antar radio */
    align-items: center;
    justify-content: center;  /* rata tengah secara horizontal */
    width: 67%;  /* atau sesuai kebutuhan */
}
.ubah-profil .ngedit-pilih {
    //flex: 2;  /* Sama seperti .masukan */
    display: flex;
    flex-direction: row;  /* Susun mendatar */
    gap: 5px;  /* Jarak antar radio button dan label */
    align-items: center;  /* Pastikan sejajar vertikal */
}
.ubah-profil .pilih-jabat {
    width: auto;  /* [5%].[auto] */
}

.ngubah-profil {
    background-color: #007bff;  /* Warna: Biru */
    color: #ffffff;  /* Warna: Putih perfect */

    /* background-color: #656565;  /* <<*/

    display: flex;
    flex-direction: column; /* Susun input & button secara vertikal */
    justify-content: center;  /* Pusatkan button */
    width: 20%;  /* Biarkan ukurannya mengikuti kontennya */
    padding: 10px 20px;  /* Atur padding sesuai kebutuhan */
    margin: 0 auto; /* Pusatkan button dalam form */
    border: none;
    border-radius: 5px;
    font-size: 24px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}
.ngubah-profil:hover {
    background-color: #0056b3;  /* Warna: Biru lebih gelap */
    /* background-color: #474747;  /**/

    /* color: #ffffff;  /* <<*/
    color: #000000;  /* <<*/
}
.ngubah-profil:active {
    color: #ffffff;  /* <<*/

    transform: scale(1.1);
}
</style>

<!--[Header . WAJIB]-->
<?php
require('resource-asset/comp-header.php');

/* PERINGATAN */
// Penjelasan lebih lanjut, tuju saja file-nya.
?>


<!--[Main Content . WAJIB]-->
<header class="heading-con">
    <script>
        function bekMenu() {
            window.location.href = ("../");
        }
        function bekAdminPro() {
            window.location.href = ("admin-control");
        }

        function konfirmAdd() {
            let tambahAkun = confirm("Are you sure editing this account?");
            
            if (tambahAkun) {
                //alert ("Oke! Terpilih!");
                return (true);
            }
            else {
                //alert ("Membatalkan...");
                return (false);
            }
            //alert ("Memastikan...");
        }
    </script>
    <h1 onclick="bekMenu()" class="start-comp"
    title="Back to the Dashboard"
    style="cursor: pointer;"><?php
    echo (("Greetings for").(", ").($username_ctd).("!"));
    ?></h1><div class="final-comp"><button class="butan" onclick="return bekAdminPro()">
    Back
    </button><button id="brekuki" name="" class="butan" onclick="return logOut()">
    Log Out
    </button></div>
</header>

<main>
<div class="konten"><h1 class="ngeblok">
Adding User Account
</h1><!-- h1 class="ngeblok"><i>
!!![ Under Maintenance ]!!!
</i></h1 -->

<!-- [Form mengubah profi;] --><div class="isi-profilan">
<form action="security-settings/add-account" class="ubah-profil" method="get">
    <div class="ngedit-pribadi" style=""><label class="ngeblok logsign" for="nama">
    Name Identity
    </label><input class="masukan" type="text" id="name_plus" name="name_plus"
    autocomplete=""
    placeholder="Fullname or Name for Identity"
    required></div>

    <div class="ngedit-pribadi" style="width= 100%;"><label class="ngeblok logsign" for="nama">
    User Role
    </label><div class="ngedit-pilih" style="user-select: none;"><?php $roles = [
        ('User'), ('Admin')
    ];

    $scan_user = ($roles[(1)-(1)]);
    $scan_admin = ($roles[(2)-(1)]);
    ///
    //$cekRole = ((($hacc_jabat) == ($roles[(2)-(1)])) ? ($roles[(2)-(1)]) : ($roles[(1)-(1)]));
    ///
    //echo (($scan_user).(" ... "));
    //echo (($scan_admin).(" ... "));
    ///
    echo (("<input type='radio'").(" "));
    echo (("name='opsi_role'").(" "));
    echo (("id='as-user'").(" "));
    echo (("class='ter-jabat'").(" "));
    echo (("style=''").(" "));
    echo (("value='").($scan_user).("' "));
    echo (("checked").(">"));
    echo (('<span style="font-size: 18px;">').($scan_user).('</span>'));
    ///
    echo (("<input type='radio'").(" "));
    echo (("name='opsi_role'").(" "));
    echo (("id='as-admin'").(" "));
    echo (("class='ter-jabat'").(" "));
    echo (("style=''").(" "));
    echo (("value='").($scan_admin).("'").(">"));
    echo (('<span style="font-size: 18px;">').($scan_admin).('</span>'));
    /// ?></div>
    </div>

    <div class="ngedit-pribadi" style=""><label class="ngeblok logsign" for="nama">
    Level Role
    </label><input class="masukan" type="text" id="lvl_jabat" name="lvl_jabat"
    autocomplete=""
    placeholder="User Role Level"
    required></div>

    <div class="ngedit-pribadi" style=""><label class="ngeblok logsign" for="nomor">
    Phone Number
    </label><input class="masukan" type="tel" id="numb_plus" name="numb_plus"
    autocomplete=""
    placeholder="Phone Number"
    required></div>

    <div class="ngedit-pribadi" style=""><label class="ngeblok logsign" for="deskripsi">
    Description
    </label><textarea id="desc_plus" name="desc_plus" style="resize: none;"
    autocomplete=""
    placeholder="Add Your Desc"
    rows="8" value="A" required>Add Your Desc</textarea></div>

    <div class="ngedit-pribadi" style=""><label class="ngeblok logsign" for="tanggal">
    Birth Date
    </label><input class="masukan" type="date" id="date_plus" name="date_plus" onclick=""
    autocomplete=""
    placeholder="<?php echo (('XX-XX-XXXX'));  // {Sebenernya [XXXX-XX-XX]} ?>"
    required></div>

    <div class="ngedit-pribadi" style=""><label class="ngeblok logsign" for="email">
    Email
    </label><input class="masukan" type="email" id="mail_plus" name="mail_plus"
    autocomplete=""
    placeholder="Email"
    required></div>

    <div class="ngedit-pribadi" style=""><label class="ngeblok logsign" for="password">
    Password
    </label><input class="masukan" type="password" id="pass_plus" name="pass_plus"
    autocomplete=""
    placeholder="Password"
    required></div>

    <button type="submit" class="ngubah-profil"
    style="user-select: none;"
    title="Editing Profile" onclick="return konfirmAdd()" >
    Adding
    </button></form>
</div></div>
</main>

<!-- [Tentang Projek] -->
<footer><?php
require ('about.php');
?></footer>

</html>
