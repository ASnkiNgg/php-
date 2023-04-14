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
        
        <input type="text" name="imie">
        <input type="text" name="id">
        <input type="submit" name="usun" value="DELETE">
        <input type="submit" name="update" value="UPDATE"><br>
        <input type="submit" name="przycisk" value="wyślij">
        <input type="submit" name="del" value="wyczyść tabele"> 
        <input type="submit" name="wyswietl" value="wyswietl"><br>
        
    </form>
    <?php
        $connection = mysqli_connect("localhost","root","","osoba");
        if (isset($_POST['przycisk'])){

            $imie= $_POST['imie'];
            $zapytanie = "INSERT INTO imie(i) Values ('$imie')";
            $cos = mysqli_query($connection, $zapytanie);
        }


        if (isset($_POST['del'])){
            $del = "Truncate table imie";
            $wywal = mysqli_query($connection, $del);
        }

        if (isset($_POST['usun'])){
            $id= $_POST['id'];
            $del = "delete from imie where id=$id";
            $wywal = mysqli_query($connection, $del);
        }

        if (isset($_POST['update'])){
            $id= $_POST['id'];
            $imie= $_POST['imie'];
            $del = "update imie SET i=('$imie') where id=$id";
            $wywal = mysqli_query($connection, $del);
        }


        if (isset($_POST['wyswietl'])){
        $zwrócenie="Select * from imie";
            $zwro = mysqli_query($connection, $zwrócenie);
            while($row=mysqli_fetch_array($zwro)){
                $wynik=["i"=>$row["i"]];
                $wyn=["Id"=>$row["Id"]];
                echo $wyn["Id"],"   ",$wynik["i"],"<br>";
            }
        }




    ?>
    
</body>
</html>
