<?php
    /* The "header" is the most important part of
    this code. Without it, it will not work. */
    header("Content-type: text/css");

/* Penjelasan */
// Ini ada 2 mode:
// Mode [Tamu]: Belum punya akun (Register) atau Masuk/Login.
// Mode [User]: Sudah punya akun (Register) atau Masuk/Login.

/* Tamu */
// Ini belum punya akun dan belum masuk. Untuk itu, ada 2 tombol:
// Login: Akan menuju ke halaman login, yakni 'login.php'.
// Login adalah metode masuk, ini metode untuk membuat akun.
// Artinya kalo belum punya akun, maka harus masuk Register dulu.
//~|
// Register: Akan menuju ke halaman register, yakni 'Register.php'.
// Register adalah metode membuat akun, ini metode sebelum Login.
// Jika sudah register, maka selanjutnya tinggal login saja.

/* User */
// Ini kalo udah punya akun. Artinya gak akan ditemukan tombol untuk [Register] dan [Login], karena sudah melakukannya.
// User ini akan memiliki hak aksesnya tersendiri:
// The User: Ini adalah hak akses biasa bagi setiap user.
// The Admin: Ini adalah hak akses khusus, mereka yang memiliki hak akses ini berarti memiliki hak akses yang tinggi.

/*[Q]*/
// 1. Hak Akses Admin itu apa aja? Emang apa yang membuatnya begitu spesial daripada yang punya User?
// 2. ?
// 3. ?
//~|
/*[A]*/
// 1. Admin bisa menghapus siapapun User. Ini bertujuan agar jika ada User yang mengacau-ngacau di web ini, maka
// User bisa untuk sebaiknya, dikeluarkan saja, sebelum kekacauannya bisa lebih parah lagi. Itu salah satunya.
// 2. .
// 3. .
?>

.heading-con {
    <?php //[ background: linear-gradient(125deg, #0fd245 15%, #8fa2db 60%, #93e9db 95%); ]
    //[ background-color: #333333; ]
    ?>
    background: linear-gradient(125deg, #0fd245 15%, #8fa2db 60%, #93e9db 95%);
    color: #000000;
    <?php /* Mengaktifkan Flexbox */ ?>
    display: flex;
    <?php /* [Column/column: Mendatar] / [Row/row: Menurun] */ ?>
    flex-direction: row;
    <?php /* Pusatkan elemen secara horizontal */ ?>
    align-items: center;
    <?php /* Menyebarkan elemen agar ada di pojok kiri dan kanan */ ?>
    justify-content: space-between;
    <?php /* Jarak antar elemen */ ?>
    gap: 10px;
    <?php /* Jarak dari tepi kiri dan kanan */ ?>
    padding: 0% 2%;
    <?php /* Menambahkan position fixed agar navbar tetap di tempat */ ?>
    position: fixed;
    <?php /* Menempatkan navbar di bagian atas layar */ ?>
    top: 0;
    <?php /* Membuat navbar selalu muncul di atas elemen lain */ ?>
    z-index: 1000;
    <?php /* Pastikan navbar mengambil lebar penuh dari kiri ke kanan */ ?>
    left: 0;
    <?php /* Pastikan navbar mengambil lebar penuh dari kanan ke kiri */ ?>
    right: 0;
    <?php /* Mencegah padding mengganggu lebar elemen */ ?>
    box-sizing: border-box;

    user-select: none;
}

.start-comp {
    <?php /*Elemen tetap di awal (kiri/atas) */ ?>
    align-self: flex-start;
    <?php /* Pusatkan elemen secara horizontal */ ?>
    text-align: center;

    <?php /* Mengaktifkan Flexbox */ ?>
    display: flex;
    <?php /* [Column/column: Mendatar] / [Row/row: Menurun] */ ?>
    flex-direction: row;
    max-width: fit-content;

    <?php /* Beri jarak 15px antara elemen */ ?>
    gap: 15px;
}
.final-comp {
    <?php /* Pusatkan elemen secara horizontal */ ?>
    text-align: center;
    <?php /* Menyebarkan elemen agar di tengah-tengah */ ?>
    justify-content: center;

    <?php /* Mengaktifkan Flexbox */ ?>
    display: flex;
    <?php /* [Column/column: Mendatar] / [Row/row: Menurun] */ ?>
    flex-direction: row;
    max-width: fit-content;

    <?php /* Beri jarak 15px antara elemen */ ?>
    gap: 35px;

    <?php /* Supaya tombol sejajar secara vertikal */ ?>
    align-items: center;
}