<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rövid italak</title>
</head>
<body>
    <table>
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
        $file = fopen("adatok.csv","r");
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
        <?php while($sor = fgets($file)):  ?>
        <?php
             $i ++;
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
</body>
</html>