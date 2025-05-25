
<?php
/* [valid-account.php] */

/*
SELECT * FROM ctd_account 
WHERE (name = ? OR forename = ? OR surname = ? OR 
phone = ? OR email = ?) AND password = ?
*/

// Start SESSION
session_start();

// Database connection
require ("koneksi-db.php");
$konek = db_connect(); // Connect to database
/* db = ('ctd_account'); */

// Check if connection is successful
if (!($konek)) {
    die (("Database connection failed").(": ").(mysqli_connect_error()));
}

// Include query rules (if needed)
require_once ("law-query.php");
require_once ('../style-css/main-setup.php');

// Validation function
function flexLogin($input) {
    $input = trim($input);
    
    // Check if input is a name (contains only letters and spaces)
    if (preg_match(('/^[a-zA-Z ]+$/'), ($input))) {
        $input = ucwords(strtolower($input));
        $names = explode((' '), ($input));  // Split into at most 2 parts
        $forename = ($names[(1)-(1)]);
        $backname = ((!(empty($names))) ? (end($names)) : (''));
        return [('type') => ('name'), ('name') => ($input), ('forename') => ($forename), ('backname') => ($backname)];
    }
    
    // Check if input is a phone number (basic validation: digits, optional +, -, or spaces)
    if (preg_match(('/^\+?[0-9\s\-]+$/'), ($input))) {
        $phone = preg_replace(('/[\s\-]/'), (''), ($input)); // Remove spaces and hyphens
        return [('type') => ('nophone'), ('nophone') => ($phone)];
    }
    
    // Check if input is an email
    if (filter_var(($input), FILTER_VALIDATE_EMAIL)) {
        return [('type') => ('email'), ('email') => ($input)];
    }
    
    // Invalid input
    return [('type') => ('invalid'), ('value') => (null)];
}

// Get and sanitize input (using GET as per hosting rules)
$validate = trim(($_GET['identy_ctd']) ?? (''));
$password = trim(($_GET['passlog_ctd']) ?? '');

// Initial validation
if ((empty($validate)) || (empty($password))) {
    die ("All fields are required!");
}

// Sanitize inputs
$validate_ctd = htmlspecialchars(($validate), ENT_QUOTES, ('UTF-8'));
$password_ctd = htmlspecialchars(($password), ENT_QUOTES, ('UTF-8'));

// Process input with flexLogin
$input_data = flexLogin($validate_ctd);

// Prepare query parameters
$full_name = ('');
$forename = ('');
$backname = ('');
$phone = ('');
$email = ('');

switch ($input_data['type']) {
    case ('name'):
        $full_name = ($input_data['name']);
        $forename = ($input_data['forename']);
        $backname = ($input_data['backname']);
        break;
    case ('nophone'):
        $phone = ($input_data['nophone']);
        break;
    case ('email'):
        $email = ($input_data['email']);
        break;
    case ('invalid'):
        die ("Invalid input format!");
}

// SQL query (adjust column names to match your database schema)
// [SELECT * FROM ctd_account] //
$flex_valid = ("
SELECT forename, roleuser, level FROM ctd_account 
WHERE (name = ? 
OR forename = ? OR backname = ? 
OR nophone = ? 
OR email = ?) 
AND password = ?
");

// Prepare and execute query
$cek_login = (($konek) -> prepare($flex_valid));
if (!($cek_login)) {
    die (("Query preparation failed").(": ").(($konek) -> error));
}

/* Laksana */
$cek_login -> bind_param(("ssssss"),
($full_name), ($forename), ($backname), ($phone), ($email), ($password_ctd));
$cek_login -> execute();
$result = (($cek_login) -> get_result());
/* Laksana */

// Check if login is successful
if (($result) -> num_rows > (0)) {
    // Fetch user data
    $user = (($result) -> fetch_assoc());
    ///
    $get_user = ($user['forename']);
    $get_roles = ($user['roleuser']);
    $get_level = ($user['level']);
    ///
    // Set session variables (adjust based on your needs)
    echo (('<br>').("Login successful!").('<br>'));
    //echo (implode((" "), ($user)));
    ///
    /* Redirect to a dashboard or home page */
    // Get: Name //
    $_SESSION['userctd_name'] = (!(empty($get_user))) ? 
    ($get_user) : (('<i>').strtoupper('Anonymous').('</i>'));
    // Get: Role //
    $_SESSION['userctd_role'] = (!(empty($get_roles))) ? 
    ($get_roles) : (('<i>').(strtoupper('NonStatus')).('</i>'));
    // Get: Level //
    $_SESSION['userctd_lvl'] = (!(empty($get_level))) ? 
    ($get_level) : (('<i>').(strtoupper('NonLeveled')).('</i>'));
    /* Redirect to a dashboard or home page */
    ///
    /* Initialize */
    $as_user = ucwords(strtolower('User'));
    $as_admin = ucwords(strtolower('Admin'));
    ///
    //echo ("<br>");
    //echo (($as_user).("<br>"));
    //echo (($as_admin).("<br>"));
    //echo ("<br>");
    /* Initialize */
    ///
    /* Tes */
    echo ("<br>");
    ///
    //echo (($test_user).("<br>"));
    //echo (($get_roles).("<br>"));
    //echo (($get_level).("<br>"));
    /* Tes */
    ///
    if (($get_roles) === ($as_user)) {
        ///
        //echo ($get_user);
        //echo ($as_user);
        ///
        header ("Location: ../dashboard-user");
        //header ("Location: ../");
        exit;
        ///
    } elseif (($get_roles) === ($as_admin)) {
        ///
        //echo ($get_user);
        //echo ($as_admin);
        ///
        header ("Location: ../dashboard-admin");
        //header ("Location: ../");
        exit;
        ///
    }
} else {
    ///
    echo ('<h1 style="text-align: center"><b>');
    echo (("Invalid credentials!").('<br>'));
    echo ("Getting Error!");
    echo ('</b></h1>');
    ///
    echo ('<p style="text-align: center"><i>');
    //echo ($full_name);
    //echo ($forename);
    //echo ($backname);
    //echo ($phone);
    //echo ($email);
    //echo ($password_ctd);
    echo ('</i></p>');
    ///
    ///
    echo ($result);
}

// Close statement and connection
($cek_login) -> close();
db_disconnect($konek);
?>
