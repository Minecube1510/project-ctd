<?php
/* [about.php] */

require ('style-css/main-setup.php');

?>


<style>
.kurungan {
    text-align: center;
    width: 90%;
    margin: 3% auto;

    display: flex;
    flex-direction: row;  /* Susunan horizontal */
    justify-content: space-between;  /* Memisahkan komponen secara merata */
    align-items: center;  /* Tengah secara horizontal */
}

li, p {
    pointer-events: none;
    user-select: none;
}
</style>


<div class="kurungan">
<p><i><?php
echo (('<b>').(ucwords('Project 04')).('</b>'));
echo (' - ');
//echo ('Glossarium of Book');
echo (ucwords('Costum Translator Dictionary'));
///echo (('<b>').(ucwords('Costum Translator Dictionary')).('</b>'));
?></i></p>

<p><?php
echo ((ucfirst('Presented by')).(': '));
///
echo ucwords('<b>');
//echo ucwords('Group 01');
echo ucwords('Group 13');
echo ucwords('</b>');
?></p>

<p><?php
echo (('Made by').(': '));
///
echo ('<i>');
echo (ucwords('Aditya Rahman'));
//echo (ucwords('Saddam Fikla Ghazali'));
echo (', ');
echo (ucwords('Riska Ibrahim'));
echo ('</i>');
?></p>
</div>
