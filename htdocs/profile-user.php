
<html>

<?php
/* profile-user.php */

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
$judul = ucwords(strtolower('Edit User Profile'));  // [UBAH DISINI]

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
.ngedit-pribadi label {
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
.ubah-profil label {
    display: flex;
    width: 25%;
    font-size: 20px;
    font-weight: bold;
    margin: auto auto auto 1%;
}
.ubah-profil input,
.ubah-profil textarea {
    flex: 2;
    width: 70%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
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

.sikret-jabat {
    color: #000000;
    text-decoration: none;
    user-select: none;
    cursor: default;
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

        function konfirmEdit() {

            let userChoice = confirm("Are you sure editing this account?");
            
            if (userChoice) {

                //alert ("Oke! Terpilih!");

               // function formatDate(getDate) {
                 //   let [year, month, day] = getDate.split('-');
                 //   if (year || month || day) {
                 //       alert("Format tanggal salah! Pastikan formatnya 'dd-mm-yyyy'.");
                  //      return "";
                  //  }
                   // return (`${day}-${month}-${year}`);
               // }

                // Ambil nilai input baru
                var edit_role = (document.getElementById("jabat_edit").value.trim());
                var edit_desc = (document.getElementById("desc_edit").value.trim());
                var edit_pass = (document.getElementById("pass_edit").value.trim());
                //
                //var fixx_date = formatDate(edit_date);

                // Ambil nilai input lama
                var prev_role = (document.getElementById("prev_rolevel").value.trim());
                var prev_desc = (document.getElementById("prev_descript").value.trim());
                var prev_pass = (document.getElementById("prev_sandi").value.trim());

                // Tes //
                //console.log (edit_role, edit_desc, edit_pass);
                //console.log (prev_role, prev_desc, prev_pass);
                // Tes //

                // Periksa apakah ada input yang kosong
                if ([edit_role, edit_desc, edit_pass].some(value => !value)) {
                    alert ("Fill 'em all!");
                    return (false);
                }

                // Periksa apakah ada perubahan dibandingkan dengan data sebelumnya
                if ([edit_role, edit_desc, edit_pass]
                .every((value, index) => value === [
                prev_role, prev_desc, prev_pass][index])) {
                    alert ("Choose something that you wanted to edit!");
                    return (false);
                }

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
    echo (("Hello").(", ").($username_ctd).("!"));
    ?></h1><div class="final-comp"><button class="butan" onclick="return bekUser()">
    Back
    </button><button id="brekuki" name="" class="butan" onclick="return logOut()">
    Log Out
    </button></div>
</header>

<main>
<div class="konten">
<a class="sikret-jabat" href="change-role"><h1 class="ngeblok sikret-jabat">
Change Profile
</h1></a><!-- h1 class="ngeblok"><i>
!!![ Under Maintenance ]!!!
</i></h1 -->

<!-- [Form mengubah profi;] --><?php

/* Initialize from: Email */
$get_email = ((isset($_GET['email'])) ? ($_GET['email']) : (''));
/* Initialize from: Email */


/* [Checking Scan having 'email'] */
//if((isset($get_email)) && (!(empty($get_email)))) {
    //echo ("Have Account");
//} else {
    //echo ("Didn't have Account");
//}
/* [Checking Scan having 'email'] */


/* Get Data: from Email */
$sql_getall = ("
SELECT * FROM ctd_account 
WHERE email = ?
");
$show_alldata = (($konek) -> prepare($sql_getall));
$show_alldata -> bind_param(("s"), ($get_email));  // "s", meaning 'string'
// Eksekusi //
$show_alldata -> execute();
// Ambil hasil //
$alldata = (($show_alldata) -> get_result());

if (($alldata) -> num_rows > 0) {
    // Email ditemukan persis
    //echo ("Found!");
} else {
    // Email tidak ditemukan
    echo (("<i>").("The Email aren't found anymore").("</i>"));
}

while ($letget = (($alldata) -> fetch_assoc())):
    // [Tanggal] //
    $cenji_birth = ($letget['datebirth']);
    $fix_birth = date(("d-m-Y"), strtotime($cenji_birth));
    ///
    $cut_birth = explode(("-"), ($fix_birth));
    $get_dd = ($cut_birth[(1)-(1)]);
    $get_mm = ($cut_birth[(2)-(1)]);
    $get_year = ($cut_birth[(3)-(1)]);
    ///
    $comb_birth = [($get_dd), ($get_mm), ($get_year)];
    $morfix_birth = implode(("/"), ($comb_birth));
    ///
    $struct_date = (DateTime::createFromFormat(("d/m/Y"), ($morfix_birth)));
    $format_date = (($struct_date) -> format("d-m-Y"));  // Format yang bisa dipakai di input date
    // [Tanggal] //
    //|//
    $def_descript = ucwords(strtolower('Add Your Desc'));
    //|//
    // [Nomor Telpon] //
    $cenji_phone = ($letget['nophone']);
    $cut_phone = str_split(($cenji_phone), (4));
    $fix_phone1 = implode(("-"), ($cut_phone));
    $fix_phone2 = implode((" - "), ($cut_phone));
    ///
    $region_code = ('+62');
    $morcut_phone = substr(($fix_phone1), (1));
    $comb_phone = [($region_code), ($morcut_phone)];
    $morfix_phone = implode((' '), ($comb_phone));
    // [Nomor Telpon] //

    // [Tes dan Cek] //
    // *Bagian yang bermasalah* //
    //echo ($letget['email']);
    //echo ($letget['email']);
    // *Bagian yang bermasalah* //
    ///
    //echo (htmlspecialchars($letget['forename']));
    //echo (htmlspecialchars($letget['backname']));
    // [Tes dan Cek] //

?><div class="isi-profilan">
<form action="security-settings/edituser-profile" class="ubah-profil" method="get">

    <!-- [Nilai Tersembunyi] -->
    <input type="hidden" name="initial_acc" id="initial_acc"
    value="<?php echo (htmlspecialchars($letget['id_acc'])); ?>">
    <!-- [//] -->
    <input type="hidden" name="prev_username" id="prev_username"
    value="<?php echo (htmlspecialchars($letget['name'])); ?>">
    <input type="hidden" name="prev_numphone" id="prev_numphone"
    value="<?php echo (htmlspecialchars($letget['nophone'])); ?>">
    <input type="hidden" name="prev_descript" id="prev_descript"
    value="<?php echo (htmlspecialchars($letget['user_desc'])); ?>">
    <input type="hidden" name="prev_bdate" id="prev_bdate"
    value="<?php echo ($format_date); ?>">
    <input type="hidden" name="prev_email" id="prev_email"
    value="<?php echo (htmlspecialchars($letget['email'])); ?>">
    <input type="hidden" name="prev_sandi" id="prev_sandi"
    value="<?php echo (htmlspecialchars($letget['password'])); ?>">
    <!-- [//] -->
    <input type="hidden" name="prev_fornem" id="prev_fornem"
    value="<?php echo (htmlspecialchars($letget['forename'])); ?>">
    <input type="hidden" name="prev_beknem" id="prev_beknem"
    value="<?php echo (htmlspecialchars($letget['backname'])); ?>">
    <!-- [//] -->
    <input type="hidden" name="prev_rolevel" id="prev_rolevel"
    value="<?php echo (htmlspecialchars($letget['level'])); ?>">
    <!-- [Nilai Tersembunyi] -->

    <div class="nampil-prbadi" style=""><label class="ngeblok" for="nama">
    Name Identity
    </label><div style="text-align: center; margin: 0% auto;">
    <p style="width: 100%; margin: 0% 0%;"><b><?php
    echo (htmlspecialchars($letget['name']));
    ?></b></p><div class="nampil-nem"><p style="margin: 2% 0%;"><i><?php
    echo (htmlspecialchars($letget['forename']));
    ?></i></p><p style="margin: 2% 0%;"><i><?php
    echo (htmlspecialchars($letget['backname']));
    ?></i></p></div>
    </div></div>

    <div class="ngedit-pribadi" style=""><label class="ngeblok" for="lvl_jabat">
    Role Level
    </label><input type="text" id="jabat_edit" name="jabat_edit"
    value="<?php echo (htmlspecialchars($letget['level'])); ?>"
    placeholder="<?php echo (htmlspecialchars($letget['level'])); ?>"
    required></div>

    <div class="ngedit-pribadi" style=""><label class="ngeblok" for="deskripsi">
    Description
    </label><textarea id="desc_edit" name="desc_edit" style="resize: none;"
    placeholder="<?php echo ($def_descript); ?>"
    rows="8" value="A" required><?php
    echo (htmlspecialchars($letget['user_desc']));
    ?></textarea></div>

    <div class="ngedit-pribadi" style=""><label class="ngeblok" for="password">
    Password
    </label><input type="password" id="pass_edit" name="pass_edit"
    value="<?php echo (htmlspecialchars($letget['password'])); ?>"
    placeholder="<?php echo (str_repeat('*', strlen(htmlspecialchars($letget['password'])))); ?>"
    required></div>

    <button type="submit" class="ngubah-profil"
    style="user-select: none;"
    title="Editing Profile" onclick="return konfirmEdit()" >
    Change
    </button><?php
    endwhile;
    ?></form>
</div></div>
</main>

<!-- [Tentang Projek] -->
<footer><?php
require ('about.php');
?></footer>

</html>
