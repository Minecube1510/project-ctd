
<html>

<?php
/* profile-adminchange.php */

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
$judul = ucwords(strtolower('Admin Control - Update'));  // [UBAH DISINI]

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
                var edit_name = (document.getElementById("name_edit").value.trim());
                var edit_numb = (document.getElementById("numb_edit").value.trim());
                var edit_desc = (document.getElementById("desc_edit").value.trim());
                var edit_date = (document.getElementById("date_edit").value.trim());
                var edit_mail = (document.getElementById("mail_edit").value.trim());
                var edit_pass = (document.getElementById("pass_edit").value.trim());
                //
                var fixx_date = formatDate(edit_date);

                // Ambil nilai input lama
                var prev_name = (document.getElementById("prev_username").value.trim());
                var prev_numb = (document.getElementById("prev_numphone").value.trim());
                var prev_desc = (document.getElementById("prev_descript").value.trim());
                var prev_date = (document.getElementById("fixprev_bdate").value.trim());
                var prev_mail = (document.getElementById("prev_email").value.trim());
                var prev_pass = (document.getElementById("prev_sandi").value.trim());

                // Periksa apakah ada input yang kosong
                if ([edit_desc, edit_pass].some(value => !value)) {
                    alert ("Fill 'em all!");
                    return (false);
                }

                // Periksa apakah ada perubahan dibandingkan dengan data sebelumnya
                if ([edit_name, edit_numb, edit_desc, edit_date, edit_mail, edit_pass]
                .every((value, index) => value === [prev_desc, prev_pass][index])) {
                    alert ("Choose something that you wanted to edit!");
                    return (false);
                }
                return (true);

                // Redirect jika semua input terisi dan ada perubahan
                //window.location.href = (("user"));
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
Change Profile
</h1><!-- h1 class="ngeblok"><i>
!!![ Under Maintenance ]!!!
</i></h1 -->

<!-- [Form mengubah profi;] --><?php

/* Initialize from: Email */
$get_email = ((isset($_GET['id_us'])) ? ($_GET['id_us']) : (''));
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
WHERE id_acc = ?
");
$show_alldata = (($konek) -> prepare($sql_getall));
$show_alldata -> bind_param(("i"), ($get_email));  // "s", meaning 'string'
// Eksekusi //
$show_alldata -> execute();
// Ambil hasil //
$alldata = (($show_alldata) -> get_result());

if (($alldata) -> num_rows > 0) {
    // Email ditemukan persis
    //echo ("Found!");
} else {
    // Email tidak ditemukan
    echo (("<i>").("The User aren't found anymore").("</i>"));
}

while ($letget = (($alldata) -> fetch_assoc())):
    // [Tanggal] //
    $bulan = [
        "Januari", "Februari", "Maret", "April",
        "Mei", "Juni", "Juli", "Agustus",
        "September", "Oktober", "November", "Desember"
    ];
    $cenji_birth = ($letget['datebirth']);
    $def_birth = date(("Y-m-d"), strtotime($cenji_birth));
    $req_birth = date(("Y-m-d"), strtotime($cenji_birth));
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
    $tampil_date = [($get_year), ($bulan[($get_mm)-(1)]), ($get_dd)];
    //$tampil_date = [($get_dd), ($bulan[($get_mm)-(1)]), ($get_year)];
    $comp_date = implode(('-'), ($tampil_date));
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
    //|//
    // [Jabatan] //
    $hacc_jabat = (htmlspecialchars($letget['roleuser']));
    $role_jabat = (htmlspecialchars($letget['level']));
    // [Jabatan] //

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
<form action="security-settings/admin-profilecontrol" class="ubah-profil" method="get">

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
    <!-- [//]-->
    <input type="hidden" name="prev_bdate" id="prev_bdate"
    value="<?php echo ($format_date); ?>">
    <input type="hidden" name="fixprev_bdate" id="fixprev_bdate"
    value="<?php echo ($req_birth); ?>">
    <!-- [//]-->
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
    <input type="hidden" name="prev_userole" id="prev_userole"
    value="<?php echo ($hacc_jabat); ?>">
    <input type="hidden" name="prev_lvl" id="prev_lvl"
    value="<?php echo ($role_jabat); ?>">
    <!-- [Nilai Tersembunyi] -->

    <div class="ngedit-pribadi" style=""><label class="ngeblok logsign" for="nama">
    Name Identity
    </label><input class="masukan" type="text" id="name_edit" name="name_edit"
    value="<?php echo (htmlspecialchars($letget['name'])); ?>"
    placeholder="<?php echo (htmlspecialchars($letget['name'])); ?>"
    required></div>

    <div class="ngedit-pribadi" style="width= 100%;"><label class="ngeblok logsign" for="nama">
    User Role
    </label><div class="ngedit-pilih" style="user-select: none;"><?php $roles = [
        ('User'), ('Admin')
    ];

    $scan_user = ((($hacc_jabat) == ($roles[(1)-(1)])) ? (("<b><i>").($roles[(1)-(1)]).("</i></b>")) : ($roles[(1)-(1)]));
    $scan_admin = ((($hacc_jabat) == ($roles[(2)-(1)])) ? (("<b><i>").($roles[(2)-(1)]).("</i></b>")) : ($roles[(2)-(1)]));
    ///
    $cekRole = ((($hacc_jabat) == ($roles[(2)-(1)])) ? ($roles[(2)-(1)]) : ($roles[(1)-(1)]));
    ///
    //echo (($scan_user).(" ... "));
    //echo (($scan_admin).(" ... "));
    ///
    echo (("<input type='radio'").(" "));
    echo (("name='pilih-jabat'").(" "));
    echo (("id='as-user'").(" "));
    echo (("class='ter-jabat'").(" "));
    echo (("style=''").(" "));
    echo (("value=").("'").($roles[(1)-(1)]).("' "));
    echo (((($cekRole) == ($roles[(1)-(1)])) ? ('checked') : ('')).(">"));
    echo (('<span style="font-size: 18px;">').($scan_user).('</span>'));
    ///
    echo (("<input type='radio'").(" "));
    echo (("name='pilih-jabat'").(" "));
    echo (("id='as-admin'").(" "));
    echo (("class='ter-jabat'").(" "));
    echo (("style=''").(" "));
    echo (("value=").("'").($roles[(2)-(1)]).("' "));
    echo (((($cekRole) == ($roles[(2)-(1)])) ? ('checked') : ('')).(">"));
    echo (('<span style="font-size: 18px;">').($scan_admin).('</span>'));
    /// ?></div>
    </div>

    <div class="ngedit-pribadi" style=""><label class="ngeblok logsign" for="nama">
    Level Role
    </label><input class="masukan" type="text" id="lvl_jabat" name="lvl_jabat"
    value="<?php echo (htmlspecialchars($letget['level'])); ?>"
    placeholder="<?php echo (htmlspecialchars($letget['level'])); ?>"
    required></div>

    <div class="ngedit-pribadi" style=""><label class="ngeblok logsign" for="nomor">
    Phone Number
    </label><input class="masukan" type="tel" id="numb_edit" name="numb_edit"
    value="<?php echo (htmlspecialchars($letget['nophone'])); ?>"
    placeholder="<?php echo ($morfix_phone); ?>"
    required></div>

    <div class="ngedit-pribadi" style=""><label class="ngeblok logsign" for="deskripsi">
    Description
    </label><textarea id="desc_edit" name="desc_edit" style="resize: none;"
    placeholder="<?php echo ($def_descript); ?>"
    rows="8" value="A" required><?php
    echo (htmlspecialchars($letget['user_desc']));
    ?></textarea></div>

    <div class="ngedit-pribadi" style=""><label class="ngeblok logsign" for="tanggal">
    Birth Date
    </label><input class="masukan" type="date" id="date_edit" name="date_edit" onclick=""
    value="<?php echo ($def_birth); ?>"
    placeholder="<?php echo (('XX-XX-XXXX'));  // {Sebenernya [XXXX-XX-XX]} ?>"
    title="<?php echo (('Your Date Saved Before').(': ').($comp_date)); ?>"
    required></div>

    <div class="ngedit-pribadi" style=""><label class="ngeblok logsign" for="email">
    Email
    </label><input class="masukan" type="email" id="mail_edit" name="mail_edit"
    value="<?php echo (htmlspecialchars($letget['email'])); ?>"
    placeholder="<?php echo (htmlspecialchars($letget['email'])); ?>"
    required></div>

    <div class="ngedit-pribadi" style=""><label class="ngeblok logsign" for="password">
    Password
    </label><input class="masukan" type="password" id="pass_edit" name="pass_edit"
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
