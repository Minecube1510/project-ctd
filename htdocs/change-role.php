
<html>

<?php
/* change-role.php */

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
<?php require ('security-settings/user-translate.php'); ?>
<?php require ('security-settings/profile-account.php'); ?>
<?php //include ('namafile.php'); ?>


<!--[Judul . WAJIB]-->
<title><?php
/* Penjudulan */
require('style-css/generate-title.php');
$judul = ucwords(strtolower('Changing Roles'));  // [UBAH DISINI]

/* Pembentukan */
$generaTitle = join(($renketsu), array(($judul), ($app_name)));
echo ($generaTitle);  // Generate!
?></title>


<style>
main {
    margin: 0;
    padding-top: 7%;  /* Menyesuaikan dengan tinggi dari Navbar */
}

th {
    pointer-events: none;
    user-select: none;
}
.ngopas {
    width: max-content;
    pointer-events: auto;  /* Mengaktifkan interaksi */
    user-select: text;  /* Memungkinkan teks untuk diseleksi */
    cursor: text;
}
.ngeblok {
    width: max-content;
    pointer-events: none;
    user-select: none;
}

.konten-user {
    padding-top: 3%;
    width: 90%;
    display: flex;
    flex-direction: column;
    align-items: center;  /* Memusatkan elemen secara horizontal */
    margin: 0 auto;  /* Memusatkan container di halaman */
    padding: 1rem;
}

.batas-tabel {
    border: 1px solid #000000;
    border-top: 1px solid #000000;
    border-right: 1px solid #000000;
    border-bottom: 1px solid #000000;
    border-left: 1px solid #000000;
}
th {
    border: 1px solid #000000;
}

.konten-perbaik {
    display: flex;
    flex-direction: row;
    width: 75%;
    margin: 2% 0;
    justify-content: center;  /* Menengahkan secara horizontal */
    align-items: center;  /* Menengahkan secara vertikal */
}
.urut-pilih {
    display: flex;
    flex-direction: row;
    gap: 5px;
    width: 50%;
    justify-content: center;  /* Menengahkan secara horizontal */
    align-items: center;  /* Menengahkan secara vertikal */
}
.konten-perbaik label {
    justify-content: center;  /* Menengahkan secara horizontal */
    align-items: center;  /* Menengahkan secara vertikal */
}
.konten-perbaik .urut-pilih {
    width: 25%;
    justify-content: center;  /* Menengahkan secara horizontal */
    align-items: center;  /* Menengahkan secara vertikal */
}
.lister {
    margin: 3%;
    width: auto;
    justify-content: center;  /* Menengahkan secara horizontal */
    align-items: center;  /* Menengahkan secara vertikal */
}

.konten-tombol {
    display: flex;
    flex-direction: row;
    gap: 25px;
}

.meng-laku {
    width: 75%;
    padding: 10px 15px;
    margin: 1% 2.5%;
    border: none;
    cursor: default;

    display: flex;
    flex-direction: row;
    justify-content: center;  /* Menengahkan secara horizontal */
    align-items: center;  /* Menengahkan secara vertikal */

    gap: 25%;
}
.meng-laku button {
    padding: 2% 7.5%;
    font-weight: bold;
    font-size: 24px;
    cursor: pointer;
    transition: 0.3s;
    font-size: 20px;
    font-weight: bold;

    color: #ffffff;  /* Putih perfect */
    border: none;
    border-radius: 5px;
}
.meng-laku .meng-oke {
    background-color: #2993E0;  /* Blue */
    /* background-color: #7C7C7C;  /* <<*/
}
.meng-oke:hover {
    background-color: #05385C;  /* Dark Blue */
    /* background-color: #2D2D2D;  /* <<*/
    color: #000000; /**/
    opacity: 0.8;  /**/
}
.meng-oke:active {
    color: #ffffff;  /* Putih perfect */
    transform: scale(0.9);  /* Memperkecil elemen */
}

.meng-laku .meng-quit {
    background-color: #F44336; /* Red */
    /* background-color: #767676;  /* <<*/
}
.meng-quit:hover {
    background-color: #8A2619;  /* Dark Red */
    /* background-color: #424242;  /* <<*/
    color: #000000;  /**/
    opacity: 0.8;  /**/
}
.meng-quit:active {
    color: #ffffff;  /* Putih perfect */
    transform: scale(0.9);  /* Memperkecil elemen */
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
        function bekUser() {
            window.location.href = ("user");
        }

        function tolakPangkat(button) {
            //let idUser = (button.getAttribute("data-id"));  // Mengambil ID dari atribut tombol
            let mauPergi = confirm ('Are you sure you want to cancel this role changing?');

            if (mauPergi) {
                //window.location.href = (("profile-adminchange?id_us=")+(idUser));
                bekUser();
            } else {
                //console.log ("User menekan Cancel!");
            }
        }
        function tujuPangkat(button) {
            const toUser = document.getElementById("ubah_user");
            const toAdmin = document.getElementById("ubah_admin");

            let naikPangkat = confirm ('Are you sure to changing your role as Admin?');

            if (naikPangkat) {
                if ((toUser).checked) {
                    alert ('You are User for now!');
                    return (false);
                } else {
                    return (true);
                }
                return (true);
            } else {
                //alert ('Canceling to changing role...');
                return (false);
            }
        }
    </script>
    <h1 onclick="bekMenu()" class="start-comp"
    title="Back to the Dashboard"
    style="cursor: pointer;"><?php
    echo (("Hello").(", ").($username_ctd).("!"));
    ?></h1><div class="final-comp"><button class="butan" onclick="return bekUser()">
    Back
    </button><button id="brekuki" name="" class="butan" onclick="return logOut()">
    Log Out
    </button></div>
</header>

<main>
<div class="konten"><h1 class="ngeblok">
Do you wanted to changing your role?
</h1>
<form class="konten-user" action="security-settings/update-role" method="get">

    <div class="konten-perbaik" style="user-select: none">
    <div class="urut-pilih">
    <input type="radio" id="ubah_user" name="ubah-role"
    class="lister" style=""
    value="User" checked>
    <label style="font-size: 20px; font-weight: bold;">
    User
    </label></div>
    <div class="urut-pilih">
    <input type="radio" id="ubah_admin" name="ubah-role"
    class="lister" style=""
    value="Admin">
    <label style="font-size: 20px; font-weight: bold;">
    Admin
    </label></div>
    </div>

    <div class="meng-laku">
        <button type="button" class="meng-quit" onclick="return tolakPangkat()">
        Quit
        </button><button type="submit" class="meng-oke" onclick="return tujuPangkat()">
        Ok
        </button>
    </div>
</form>


</main>

<!-- [Tentang Projek] -->
<footer><?php
require ('about.php');
?></footer>

</html>
