<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rövid italak</title>
</head>
<body>
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
            <input type="number" id="a_input" name="nev" placeholder="ALkohol tartalom (%-ban)">
        </div>
            <label for="k_input">Kiszerelés mérete : </label>
        <div>
            <input type="radio" id="02" name="02" value="0,2dl">
            <label for="02">0,2dl</label><br>
            <input type="radio" id="05" name="05" value="0,5dl">
            <label for="05">0,5dl</label><br>
            <input type="radio" id="1l" name="1l" value="1l">
            <label for="javascript">1l</label>
        </div>
        <div>
            <label for="nev_input">Fajtája: </label>
            <select name="fajta" id="fajta">
                <option value="rum">Rum</option>
                <option value="sor">Sör</option>
                <option value="likor">Likőr</option>
                <option value="Palinka">Pálinka</option>
                <option value="whisky">Whisky</option>
                <option value="bor">Bor</option>
                <option value="egyeb">egyéb</option>
            </select>
        </div>
        <button type="submit">Felvétel</button>
    </form>
</body>
</html>