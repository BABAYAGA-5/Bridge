<?php
require "connexion.php";
require "fonctions.php";
$filename = 'sanctions.txt';
$file = fopen($filename, 'w');
fwrite($file, "insert into sanctions(id_emp,date,tranche) values ");
$l=[50,100,150,200];
for($id=1005;$id<=2036;$id++)
{
    if($id>2007 && $id<2035)
    continue;
    echo "hello world";
    $sql="select id_emp,salaire_brut from etat where id_emp=$id";
    $result=$con->query($sql);
    $row=$result->fetch_assoc();
    for($i=0;$i<=500;$i++)
    {
        if($i==rand(0,500))
        {
            $date=random_date();
            $tranche=$l[rand(0,3)];
            $x="($id,'$date',$tranche),";
            fwrite($file,$x);
        }
        
    }
}
