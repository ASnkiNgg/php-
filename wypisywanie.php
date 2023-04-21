
<?php
if(isset($_POST["cos"])){
    $tekst = $_POST["tekst"];
    $wyswietl = "Select * from imie";
    $zwrocenie = mysqli_query($connection,$wyswietl);
    while($row=mysqli_fetch_row($zwrocenie)){
        echo "$row[0]";
        echo "";
        echo "$row[1],<br>";
    }

}
?>
