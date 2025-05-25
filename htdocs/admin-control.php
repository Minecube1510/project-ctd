
<html>

<?php
/* admin-control.php */

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
$judul = ucwords(strtolower('Admin Control'));  // [UBAH DISINI]

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
    margin: 0 auto;
    width: 70%;
}
.kotak-trenslet td {
    border: 1px solid #000000;
}

.meng-laku {
    width: 45%;
    padding: 10px 15px;
    margin: 1% 2.5%;
    border: none;
    cursor: pointer;
    font-size: 20px;
    font-weight: bold;
    border-radius: 5px;
    transition: 0.3s;
}
.meng-edit {
    background-color: #2993E0;  /* Blue */
    /* background-color: #7C7C7C;  /* <<*/
    color: #ffffff;  /* Putih perfect */
    /* color: #ffffff;  /* <<*/
}
.meng-edit:hover {
    background-color: #05385C;  /* Dark Blue */
    /* background-color: #2D2D2D;  /* <<*/
    color: #000000; /**/
    opacity: 0.8;  /**/
}
.meng-edit:active {
    transform: scale(0.9);  /* Memperkecil elemen */
}

.meng-erase {
    background-color: #F44336; /* Red */
    /* background-color: #767676;  /* <<*/
    color: #ffffff;  /* Putih perfect */
    /* color: #ffffff;  /* <<*/
}
.meng-erase:hover {
    background-color: #8A2619;  /* Dark Red */
    /* background-color: #424242;  /* <<*/
    color: #000000;  /**/
    opacity: 0.8;  /**/
}
.meng-erase:active {
    transform: scale(0.9);  /* Memperkecil elemen */
}

.edit-profil {
    background-color: #007bff;  /* Warna: Biru */
    color: #ffffff;  /* Warna: Putih Perfect */

    /* background-color: #656565;  /* <<*/
    /* color: #CACACA;  /* <<*/

    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 24px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s ease;
}
.edit-profil:hover {
    background-color: #0056b3;  /* Warna: Biru Gelap */
    /* background-color: #474747;  /* <<*/
}
.edit-profil:active {
    background-color: #00408a;  /* Warna: Biru Lebih Gelap */
    color: #000000;  /* Warna: Hitam Perfect */

    /* background-color: #353535;  /* <<*/
    /* color: #171717;  /* <<*/
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

        function ubahAkun(button) {
            let idUser = (button.getAttribute("data-id"));  // Mengambil ID dari atribut tombol

            if (confirm((`Are you sure to edit this user?`) + (`\n`) +
            (`Editing to User ID: ${idUser}`))) {
                //window.location.href = (("profile-adminchange?id_us=")+(idUser));
                window.location.href = (("profile-adminchange") + ("?") + ("id_us") + ("=") + (idUser));
            } else {
                //console.log("User menekan Cancel!");
            }
        }
        function hapusAkun(button) {
            let idUser = button.getAttribute("data-id");  // Mengambil ID dari atribut tombol

            if (confirm((`Are you sure to erasing this user?`) + (`\n`) +
            (`Erasing for User ID: ${idUser}`))) {
                //window.location.href = (("security-settings/delete-account?id_us=")+(idUser));
                window.location.href = (("security-settings/delete-account") + ("?") + ("id_us") + ("=") + (idUser));
            } else {
                //console.log("User menekan Cancel!");
            }
        }
    </script>
    <h1 onclick="bekMenu()" class="start-comp"
    title="Back to the Dashboard"
    style="cursor: pointer;"><?php
    echo (("Greetings for").(", ").($username_ctd).("!"));
    ?></h1><div class="final-comp"><button class="butan" onclick="return bekUser()">
    Back
    </button><button id="brekuki" name="" class="butan" onclick="return logOut()">
    Log Out
    </button></div>
</header>

<main>
<div class="konten"><h1 class="ngeblok">
Admin Control
</h1><?php

$tek_all = ("SELECT * FROM ctd_account");

//$get_logacc = ($konek) -> prepare($tek_all);
$get_logacc = ($konek) -> prepare($tek_all);
($get_logacc) -> execute();
$result_logacc = ($get_logacc) -> get_result();

?><table class="trenslet">
    <!-- [Baris Header] -->  <tr><th>
    No List
    </th><th>
    Username
    </th><th>
    Birth Date
    </th><th>
    Phone Number
    </th><th>
    Email
    </th><th>
    Update or Delete
    </th></tr>  <!-- [Baris Header] -->


    <!-- [Baris Showing] --> <?php
    $nolist = (1);  // Inisialisasi nomor urut
    if (($result_logacc) -> num_rows == (0)):
    //($all_logus) -> fetch_assoc(); ?><tr>
    <td colspan="6" class="ngeblok">
    Let's make the tranlastions!
    </td></tr><?php else:
        while ($row = (($result_logacc) -> fetch_assoc())): ?>
        <tr class="kotak-trenslet"><td class="ngeblok"
            data-id="<?php echo htmlspecialchars($row['id_acc']); ?>"><?php
                echo ($nolist);
            ?></td>
            <td class="ngeblok"><?php
            echo (htmlspecialchars($row['name']));
            ?></td><td class="ngeblok"><?php
            echo (htmlspecialchars($row['datebirth']));
            ?></td><td class="ngeblok"><?php
            echo (htmlspecialchars($row['nophone']));
            ?></td><td class="ngeblok"><?php
            echo (htmlspecialchars($row['email']));
            ?></td><td><?php
                echo ("<button class='meng-laku meng-edit' style='user-select: none;' data-id='")
                .(htmlspecialchars($row['id_acc']))
                .("' onclick='ubahAkun(this)'>")
                .("Update")  // [Edit / Update]
                .("</button>");
                ///
                echo ("<button class='meng-laku meng-erase' style='user-select: none;' data-id='")
                .(htmlspecialchars($row['id_acc']))
                .("' onclick='hapusAkun(this)'>")  // { hapusAkun(this) }
                .("Delete")  // [Erase / Delete]
                .("</button>");
                ///
                $nolist++;
            ?></td></tr><?php endwhile;
        endif; ?><!-- [Baris Showing] -->
    </table></div>
</main>

<!-- [Tentang Projek] -->
<footer><?php
require ('about.php');
$get_logacc -> close();
?></footer>

</html>
