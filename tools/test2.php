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
        else if($x==2)
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
for($i=0;$i<50;$i++)
{
    echo random_time("08:00:00",1)."\n";
}