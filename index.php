<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rövid italak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="felvetel.php">Felvétel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Lista</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <main class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Név</th>
                    <th>Gyártási év</th>
                    <th>ALkohol tartalom (%-ban)</th>
                    <th>Kiszerelése</th>
                    <th>#Fajtája</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $file = fopen("adatok.csv", "r");
                $fajta = [
                    'rum' => "Rum",
                    'sor' => "Sör",
                    'likor' => "Likőr",
                    'palinka' => "Pálinka",
                    'whisky' => "Whisky",
                    'bor' => "Bor",
                    'egyeb' => "Egyéb"
                ];
                $i = 0;
                ?>
                <?php while ($sor = fgets($file)) :  ?>
                    <?php
                    $i++;
                    $adatotok = explode(';', trim($sor));
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $adatotok[0] ?></td>
                        <td><?php echo $adatotok[1] ?></td>
                        <td><?php echo $adatotok[2] ?></td>
                        <td><?php echo $adatotok[3] ?></td>
                        <td><?php echo $fajta[$adatotok[4]]; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Név</th>
                    <th>Gyártási év</th>
                    <th>Alkohol tartalom (%-ban)</th>
                    <th>Kiszerelése</th>
                    <th>#Fajtája</th>
                </tr>
            </tfoot>
        </table>
    </main>
</body>

</html>