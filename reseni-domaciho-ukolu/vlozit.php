<?php

// Tento soubor uloží nový příspěvek do souboru prispevky.txt a zobrazí odkaz zpět na návštěvní knihu

if (!isset($_POST['jmeno'], $_POST['vzkaz'])) {
    echo 'Přístup odepřen.';
} elseif ($_POST['jmeno'] === '' || $_POST['vzkaz'] === '') {
    echo 'Nebylo vyplněno jméno nebo vzkaz.';
} else {
    $jmeno = $_POST['jmeno'];
    $vzkaz = $_POST['vzkaz'];

    $zaznam = "<b>$jmeno</b><br>$vzkaz<hr>";

    $handle = fopen('prispevky.txt', 'a');

    if ($handle === false) {
        echo 'Nepodařilo se otevřít soubor prispevky.txt pro uložení vzkazu!';
    } else {
        fwrite($handle, $zaznam);
        fclose($handle);
        echo 'Vzkaz byl uložen.';
    }
}

?>

<a href="navstevni-kniha.php">Vrátit se zpět na návštěvní knihu</a>.
