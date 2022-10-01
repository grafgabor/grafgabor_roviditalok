<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rövid italak</title>
</head>
<body>
<main>
    <?php
        if (isset($_POST) && !empty($_POST)) {
            $hiba = "";
            if (!isset($_POST['nev']) || empty($_POST['nev'])) {
                $hiba .= "A név megadása kotelező. ";
            }
            if (!isset($_POST['gy']) || empty($_POST['gy'])) {
                $hiba .="Gyártási év kitöltése kötelező. ";
            } else if (!is_numeric($_POST['gy'])) {
                $hiba .="Gyártási év csak egész szám lehet. ";
            } else if ($_POST['gy'] > date('Y')) {
                $hiba .="Gyártási év nem lehet tobb mint a mai datum. ";
            }
            if (!isset($_POST['a']) || empty($_POST['a'])) {
                $hiba .="Alkohol tartalom kitöltése kötelező. ";
            } else if (!is_numeric($_POST['a'])) {
                $hiba .="Alkohol tartalom csak szám lehet. ";
            }
            if (!isset($_POST['m']) || empty($_POST['m'])) {
                $hiba .="Kiszerelés kitöltése kötelező. ";
            }
            if (!isset($_POST['fajta']) || empty($_POST['fajta'])) {
                $hiba .="fajta kitöltése kötelező. ";
            } else if (!in_array($_POST['fajta'],['rum','sor','likor','palinka','whisky','bor','egyeb'])) {
                $hiba .="A fajtát a legordulo menubol lehet csak kivalsztani. ";
            }
            ?>
            <?php if ($hiba =="") : ?>
                <?php
                $file = fopen("adatok.csv","a");
                $sor = implode(";",$_POST) . PHP_EOL;
                fwrite($file,$sor);
                ?>
                <p>Sikeres felvetel</p>
            <?php else: ?>
                <p><?php echo $hiba ?></p>
            <?php endif; ?>
        <?php
        }
        ?>
        <h1>Rövid italok</h1>
        <form action="felvetel.php" method="post" name="ital_felvetel">
            <div>
                <label for="nev">Név: </label>
                <input type="text" id="nev" name="nev" placeholder="Név">
            </div>
            <div>
                <label for="gy">Gyártási év: </label>
                <input type="number" id="gy" name="gy" placeholder="Gyártási év">
            </div>
            <div>
                <label for="a">Alkohol tartalom: </label>
                <input type="number" id="a" name="a" placeholder="ennyi % alkoholt tartalmaz">
            </div>
                <label for="m">Kiszerelés mérete : </label>
            <div>
                <input type="radio" id="02" name="m" value="0,2dl" id="02">
                <label for="02">0,2dl</label><br>
                <input type="radio" id="05" name="m" value="0,5dl" id="05">
                <label for="05">0,5dl</label><br>
                <input type="radio" id="1l" name="m" value="1l" id="1">
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
</main>
</body>
</html>