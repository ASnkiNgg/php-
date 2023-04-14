<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <h1>Nazwyam się</h1>
    <form method = "post">
        
        <input type="text" name="imie"><br>
        <input type="submit" name="przycisk" value="submit">
        <input type="submit" name="wy" value="zresetuj strone">
        <input type="submit" name="del" value="wyczyść tabele"> <br>
    </form>
    <?php
        $connection = mysqli_connect("localhost","root","","osoba");
        if (isset($_POST['przycisk'])){

            $imie= $_POST['imie'];
            $zapytanie = "INSERT INTO imie(i) Values ('$imie')";
            $cos = mysqli_query($connection, $zapytanie);
            $zwrócenie="Select * from imie";
            $zwro = mysqli_query($connection, $zwrócenie);
            while($row=mysqli_fetch_array($zwro)){
                $wynik=["i"=>$row["i"]];
                $wyn=["id"=>$row["id"]];
                echo $wyn["id"],$wynik["i"],"<br>";
            }
        }
        if (isset($_POST['przycisk'])){
            header("Refresh:10");

        }

        if (isset($_POST['del'])){
            $del = "Truncate table imie";
            $wywal = mysqli_query($connection, $del);
        }

    
    ?>
    
</body>
</html>
