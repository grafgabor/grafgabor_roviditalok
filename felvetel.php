<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rövid italak</title>
</head>
<body>
<?php
    if (isset($_post) && !empty($_post)) {
        $hiba = "";
        if (!isset($_post['nev']) || empty($_post['nev'])) {
            $hiba .= "A név megadása kotelező";
        }
        if (!isset($_post['gy']) || empty($_post['gy'])) {
            $hiba .="Gyártási év kitöltése kötelező. ";
        } else if (!is_numeric($_post['gy'] || round($_post['gy']) != $_post['gy'])) {
            $hiba .="Gyártási év csak egész szám lehet. ";
        } else if ($_post['gy'] > date('Y')) {
            $hiba .="Gyártási év nem lehet tobb mint a mai datum. ";
        }
        if (!isset($_post['a']) || empty($_post['a'])) {
            $hiba .="Alkohol tartalom kitöltése kötelező. ";
        } else if (!is_numeric($_post['a'])) {
            $hiba .="Alkohol tartalom csak szám lehet. ";
        }
        if (!isset($_post['m']) || empty($_post['m'])) {
            $hiba .="Kiszerelés kitöltése kötelező. ";
        }
        if (!isset($_post['fajta']) || empty($_post['fajta'])) {
            $hiba .="fajta kitöltése kötelező. ";
        } else if (!in_array($_post['fajta'],['rum','sor','likor','palinka','whisky','bor','egyeb'])) {
            $hiba .="A fajtát a legordulo menubol lehet csak kivalsztani ";
        }
    }
    ?>
    <h1>Rövid italok</h1>
    <form action="felvetel.php" method="post" name="ital_felvetel">
        <div>
            <label for="nev_input">Név: </label>
            <input type="text" id="nev_input" name="nev" placeholder="Név">
        </div>
        <div>
            <label for="gy_input">Gyártási év: </label>
            <input type="text" id="gy_input" name="gy" placeholder="Gyártási év">
        </div>
        <div>
            <label for="a_input">Alkohol tartalom(%-ban megadva): </label>
            <input type="number" id="a_input" name="a" placeholder="ALkohol tartalom (%-ban)">
        </div>
            <label for="k_input">Kiszerelés mérete : </label>
        <div>
            <input type="radio" id="02" name="m" value="0,2dl">
            <label for="02">0,2dl</label><br>
            <input type="radio" id="05" name="m" value="0,5dl">
            <label for="05">0,5dl</label><br>
            <input type="radio" id="1l" name="m" value="1l">
            <label for="javascript">1l</label>
        </div>
        <div>
            <label for="nev_input">Fajtája: </label>
            <select name="fajta" id="fajta">
                <option value=""></option>
                <option value="rum">Rum</option>
                <option value="sor">Sör</option>
                <option value="likor">Likőr</option>
                <option value="palinka">Pálinka</option>
                <option value="whisky">Whisky</option>
                <option value="bor">Bor</option>
                <option value="egyeb">egyéb</option>
            </select>
        </div>
        <button type="submit">Felvétel</button>
    </form>
</body>
</html>