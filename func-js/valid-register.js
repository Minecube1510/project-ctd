/* valid-register.js */
function menDaftar() {
    var name = document.getElementById("namae_ctd").value;
    //var date = document.getElementById("lahir_ctd").value;
    var telp = document.getElementById("phone_ctd").value;
    var mail = document.getElementById("email_ctd").value;
    var pswd = document.getElementById("sandi_ctd").value;


    let bgn_name = (1), end_name = (150);
    //let date_valid = (10), bgn_date = (date_valid), end_date = (date_valid);
    let bgn_telp = (4), end_telp = (20);
    let bgn_mail = (10), end_mail = (150);
    let bgn_pswd = (10), end_pswd = (255);


    //
    if (((name).length) < (bgn_name)) {
        alert('Your Name is too short!');
        return (false);
    }
    if (((name).length) > (end_name)) {
        alert('Your Name is too long!');
        return (false);
    }
    //
    if (((telp).length) < (bgn_telp)) {
        alert('Phone Number is too short!');
        return (false);
    }
    if (((telp).length) > (end_telp)) {
        alert('Phone Number is too long!');
        return (false);
    }
    //
    if (((mail).length) < (bgn_mail)) {
        alert('Email is too short!');
        return (false);
    }
    if (((mail).length) > (end_mail)) {
        alert('Email is too long!');
        return (false);
    }
    //
    if (((pswd).length) < (bgn_pswd)) {
        alert('Password is too short!');
        return (false);
    }
    if (((pswd).length) > (end_pswd)) {
        alert('Password is too long!');
        return (false);
    }
    //

    return (true);
}
//
