<?php
require "fonctions.php";
require "connexion.php";
function random_time($x,$t)
{
    if($x=="08:00:00")
    {
        if($t==1)
        {
            $s=rand(0,59);
            if($s<10)
            {
                $s="0".$s;
            }
            $m=rand(0,9);
            $z=rand(1,2);
            if($z==1)
            {
                if($m!=0)
                {
                    $m=60-$m;
                }
                
                return "07:$m:$s";
            }
            else
                $m="0".$m;
                return "08:$m:$s";
        }
        else if($t==2)
        {
            $s=rand(0,59);
            if($s<10)
            {
                $s="0".$s;
            }
            $m=rand(0,9);
            $z=rand(1,2);
            if($z==1)
            {
                if($m!=0)
                {
                    $m=60-$m;
                }
                
                return "16:$m:$s";
            }
            else
                $m="0".$m;
                return "15:$m:$s";
        }
    }
    else if($x=="09:00:00")
    {
        if($t==1)
        {
            $s=rand(0,59);
            if($s<10)
            {
                $s="0".$s;
            }
            $m=rand(0,9);
            $z=rand(1,2);
            if($z==1)
            {
                if($m!=0)
                {
                    $m=60-$m;  
                }
                
                return "08:$m:$s";
            }
            else
                $m="0".$m;
                return "09:$m:$s";
        }
        else if($t==2)
        {
            $s=rand(0,59);
            if($s<10)
            {
                $s="0".$s;
            }
            $m=rand(0,9);
            $z=rand(1,2);
            if($z==1)
            {
                if($m!=0)
                {
                    $m=60-$m;
                }
                return "16:$m:$s";
            }
            else
                $m="0".$m;
                return "17:$m:$s";
        }
    }
}  
$filename = 'sql3.txt';
$file = fopen($filename, 'w');
fwrite($file, "insert into pointage values ");
for ($i = 2035; $i <= 2035; $i++)
{
    $sql="select heure_debut from etat where id_emp = $i";
    $result=$con->query($sql);
    $row=$result->fetch_assoc();
    $heure_debut=$row["heure_debut"];
    $sql="select date_embauche from employe where id_emp = $i";
    $result=$con->query($sql);
    $row=$result->fetch_assoc();
    $date="2023-04-05";
    $current_date=strtotime(date("y-m-d"));
    $n=31;
    for ($j = 0; $j < $n; $j++)
    {
        $start=random_time($heure_debut,1);
        $end=random_time($heure_debut,2);
        $sql="($i,'$date $start','$date $end'),";
        fwrite($file, $sql);
        $date = date('Y-m-d', strtotime($date . ' + ' . 1 . ' days'));
    }
}
fclose($file);
?>
