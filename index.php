<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <?php
        $ip = '127.0.0.1';
        $username = 'root';
        $database = 'sistema_sia';
        $passwd = '';
        $connection = new mysqli($ip, $username, $passwd, $database);

        if ($connection->connect_error) { die("Errore! Impossibile ragiungere il database"); }
        
        ?>

        <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="text" id="inpReg" name="regione">
            <label for="parchi">Seleziona un parco</label>
            <select name="parchi" id="pSl">
                $query = 'SELECT Nome FROM parchi WHERE Regione="Lombardia";
                $queryRes = $connection->query($query);
                if ($queryRes->num_rows > 0) {
                        while ($row = $queryRes->fetch_assoc()) {
                            echo '<option value="' . $row['id_Parco'] . '">' . $row['Nome'] . '</option>';
                        }
            </select>
        </form>
    </body>
</html>