<!DOCTYPE html>
<html lang="en">
<head>
    <title>Úkol 2</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<br>
<div class="container">
    <!-- Formulář pro uložení nového vzkazu: -->
    <form method="POST" action="vlozit.php">
        <div class="form-group">
            <label for="loginInput">Jméno:</label>
            <input type="text" class="form-control" id="loginInput" name="jmeno">
        </div>
        <div class="form-group">
            <label for="textarea">Vzkaz:</label>
            <textarea class="form-control" id="textarea" name="vzkaz"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Přidat vzkaz</button>
    </form>
    <br>
    <br>

    <!-- Vypsání příspěvků: -->
    <?php

    // funkce nacte soubor a vrati jeho obsah; pokud je soubor prazdny, vraci false
    function nactiSoubor($nazev) {
        if (!file_exists($nazev)) {
            return false;
        }

        $data = @file_get_contents($nazev);

        if (!$data) {
            return false;
        }

        return $data;
    }

    // funkce seradi prispevky od nejnovejsiho
    function seradPrispevky($prispevky, $oddelovac) {
        $rozdeleno = explode($oddelovac, $prispevky);
        $serazeno = array_reverse($rozdeleno);
        $spojeno = implode($serazeno, $oddelovac);

        return $spojeno;
    }

    // nacteni souboru s prispevky
    $prispevky = nactiSoubor('prispevky.txt');

    // vypsani prispevku
    if ($prispevky === false) {
        echo 'Žádné příspěvky';
    } else {
        // vypsani prispevku od nejstarsich:
        // echo $prispevky;

        // vypsani prispevku od nejnovejsich:
        echo seradPrispevky($prispevky, '<hr>');
    }

    ?>
</div>
</body>
</html>
