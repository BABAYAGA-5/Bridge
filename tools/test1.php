<?php
require "connexion.php";
require "fonctions.php";
$filename = 'suite.txt';
$file = fopen($filename, 'w');
fwrite($file, "insert into salaire values ");
for($id=1005;$id<=2036;$id++)
{
    if($id>2007 && $id<2035)
    continue;
    $sql="select id_emp,salaire_brut from etat where id_emp=$id";
    $result=$con->query($sql);
    $row=$result->fetch_assoc();
    $i=2024;
        echo "hello world";
            $d=6;
        for($j=1;$j<=$d;$j++)
        {
            $a=$j;
            if($j<=9)
            {
                $a="0".$j;
            }
            $etat="Payé";
            if(rand(1,1000)==1)
            {
                $etat="Non Payé";
            }
            $salaire=$row['salaire_brut'];
            $x="($id,'$i-$a',$salaire,'$etat'),";
            fwrite($file,$x);
        }
    }