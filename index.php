<?php
$background = array(
    array("x"=>28, "y"=>18, "ox"=>1, "oy"=>1, "z"=>"&nbsp"), // wysokość i długość tła
);
$prostokat = array(
    array("x"=>40, "y"=>3, "ox"=>4, "oy"=>4, "z"=>"■"),   // wysokość i długość  prostokątów 
    array("x"=>16, "y"=>90, "ox"=>10, "oy"=>13, "z"=>"■"),
    array("x"=>12, "y"=>4, "ox"=>10, "oy"=>8, "z"=>"■"),   
);
$ramka = array("x"=>30, "y"=>20, "ox"=>0, "oy"=>0, "z"=>"¥"); // długość i wysokość ramki

echo"<pre>";
print_r($background);
print_r($prostokat);
$g=array();
function rysuj(&$tab,&$g){   //funkcja która rysuje ramkę i tło
    for($y=$tab["oy"]; $y<$tab["y"]+$tab["oy"]; $y++)
    {
        for($x=$tab["ox"];$x<$tab["x"]+$tab["ox"]; $x++)
        {
            $g[$y][$x]=$tab["z"];
        }
    }
}
function prostokaty(&$tab, &$render, &$f)  //funkcja rysuje porstokąty                     
{
    for($y=$tab["oy"];$y<$tab["y"]+$tab["oy"]; $y++)
    {
        for($x=$tab["ox"]; $x<$tab["x"]+$tab["ox"]; $x++)
        {
            if($y>=$f["oy"] and $y<$f["y"]-1 and $x>$f["ox"] and $x<$f["x"]-1){ // sprawdza czy prostokąt wychodzi za ramke 
            $render[$y][$x]=$tab["z"];
            }
        }
    }
};
rysuj($ramka,$g); //rysuje ramke
foreach($background as $b){  //rysuje tło
    rysuj($b,$g);
}
foreach($prostokat as $p){   //rysuje prostokąty
    prostokaty($p,$g,$ramka);
}

foreach($g as $wiersz){     // foreach w którym jak jest koniec linijki przechodzi do kolejnego wiersza
    foreach($wiersz as &$znak){
        echo $znak;
    }
    echo"<br>";
}
?>