/* request.js */

document.addEventListener(("DOMContentLoaded"), function() {
    function untukMasuk(e) {
        e.preventDefault();
        /* Menuju halaman Login */
        window.location.href = ("login");
    }
    function untukDaftar(e) {
        e.preventDefault();
        /* Menuju halaman Register, Daftar Akun */
        window.location.href = ("register");
    }

    function userProfile(e) {
        e.preventDefault();
        /* Menuju halaman User-Profil, Data Akun milik User */
        window.location.href = ("user");
    }
    function adminProfile(e) {
        e.preventDefault();
        /* Menuju halaman User-Profil, Data Akun milik User */
        window.location.href = ("admin");
    }
    
    function remuKuki(e) {
        e.preventDefault();
        /* Fungsi untuk Log-Out */
        window.location.href = ("../security-settings/handle-logout");
    }

    function setupEventListeners() {
        var keDaftar = document.getElementById("regup");
        var keMasuk = document.getElementById("login");
        var profilUser = document.getElementById("profile-user");
        var profilAdmin = document.getElementById("profile-admin");
        var hancurKuki = document.getElementById("brekuki");

        if (keDaftar) {
            keDaftar.removeEventListener(("click"), untukDaftar);
            keDaftar.addEventListener(("click"), untukDaftar);
        }
        if (keMasuk) {
            keMasuk.removeEventListener(("click"), untukMasuk);  // Ini membersihkan listener yang lama
            keMasuk.addEventListener(("click"), untukMasuk);
        }

        if (profilUser) {
            profilUser.removeEventListener(("click"), userProfile);
            profilUser.addEventListener(("click"), userProfile);
        }
        if (profilAdmin) {
            profilUser.removeEventListener(("click"), adminProfile);
            profilUser.addEventListener(("click"), adminProfile);
        }

        if (hancurKuki) {
            hancurKuki.removeEventListener(("click"), remuKuki);
            hancurKuki.addEventListener(("click"), remuKuki);
        }
    }
    setupEventListeners();  // Pasang listener saat halaman dimuat

    // Deteksi halaman ketika dipulihkan dari bfcache
    window.addEventListener(("pageshow"), function(event) {
        if (event.persisted) {
            setupEventListeners(); // Pasang ulang listener setelah kembali dari cache
        }
    });
});


function reqLogin() {
    window.location.href = ("login");
}
function reqRegister() {
    window.location.href = ("register");
}

function userProfile() {
    window.location.href = ("user");
}
function adminProfile() {
    window.location.href = ("admin");
}

function logOut() {
    window.location.href = ("../security-settings/handle-logout");
}
