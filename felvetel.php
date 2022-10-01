<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rövid italak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script>
        function validalas(){
            const nev = document.forms[ital_felvetel] [nev].value
            const gy = document.forms[ital_felvetel] [gy].value
            const a = document.forms[ital_felvetel] [a].value
            const  m  = document.forms[ital_felvetel] [m].value
            const fajta = document.forms[ital_felvetel] [fajta].value
            if (nev.trim().length == 0) {
                alert("A név megadása kötelező")
                return false
            }
            if (gy.trim().length == 0) {
                alert("A gyártási év megadása kötelező")
                return false
            }
            if (gy != parseInt(gy)) {
                alert("A gyártási év csak egész szám lehet")
                return false
            }
            
            if (2022 > gy) {
                alert("A gyártási év nem elhet tobb mint a mai datum")
                return false
            }

            if (a.trim().length == 0) {
                alert("A alkohol mennyisége megadása kötelező")
                return false
            }
            if (100 > a ) {
                alert("A alkohol mennyisége nem lehet tobb mint 100%")
                return false
            }
            if (a != parseInt(gy)) {
                alert("A alkohol mennyisége csak egész szám lehet kerekitse a megadott mennyiséget ")
                return false
            }
            if (m.trim().length == 0) {
                alert("A a kiszereles megadása kötelező")
                return false
            }
            if (fajta.trim().length == 0) {
                alert("A fajta megadása kötelező")
                return false
            }
            return true
        }
    </script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Lista</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="felvetel.php">Felvetel</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<main class="container">
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
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                Sikeres felvetel.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php else: ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $hiba ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
        <?php
        }
        ?>
        <h1>Rövid italok</h1>
        <form action="felvetel.php" method="post" name="ital_felvetel" onsubmit="return validalas();">
            <div class="mb-3">
                <label for="nev">Név: </label>
                <input class="form-control" type="text" id="nev" name="nev" placeholder="Név" required>
            </div>
            <div class="mb-3">
                <label for="gy">Gyártási év: </label>
                <input class="form-control" type="number" id="gy" name="gy" placeholder="Gyártási év" required>
            </div>
            <div class="mb-3">
                <label for="a">Alkohol tartalom: </label>
                <input class="form-control" type="number" id="a" name="a" placeholder="ennyi % alkoholt tartalmaz" required>
            </div>
                <label for="m">Kiszerelés mérete : </label>
            <div class="mb-3">
                <input  type="radio" id="02" name="m" value="0,2dl" id="02" required>
                <label  for="02">0,2dl</label><br>
                <input  type="radio" id="05" name="m" value="0,5dl" id="05">
                <label for="05">0,5dl</label><br>
                <input  type="radio" id="1l" name="m" value="1l" id="1">
                <label for="javascript">1l</label>
            </div>
            <div class="mb-3">
                <label for="nev_input">Fajtája: </label>
                <select class="form-select" name="fajta" id="fajta" required>
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
            <button class="btn btn-outline-secondary" type="submit">Felvétel</button>
        </form>
</main>
</body>
</html>