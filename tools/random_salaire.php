<?php
require "connexion.php";
require "fonctions.php";
$filename = 'salaire.txt';
$file = fopen($filename, 'w');
fwrite($file, "insert into salaire values ");
for($id=1005;$id<2008;$id++)
{
    $sql="select id_emp,montant from salaire where id_emp=$id";
    $result=$con->query($sql);
    $row=$result->fetch_assoc();
    for($i=2020;$i<=2024;$i++)
    {
        echo "hello world";
        if($i!=2024)
        {
            $d=12; 
        }
        else 
        {
            $d=5;
        }
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
            $salaire=$row['montant'];
            $x="($id,'$i-$a',$salaire,'$etat'),";
            fwrite($file,$x);
        }
    }
}
