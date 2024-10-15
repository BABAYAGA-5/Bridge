<?php
$ip="192.168.56.1";
function randomPassword()
{
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $n = rand(0, strlen($alphabet)-1);
    $pass=$alphabet[$n];
    for ($i = 1; $i < 8; $i++)
    {
        $n = rand(0, strlen($alphabet)-1);
        $pass= $pass.$alphabet[$n];
    }
    return $pass;
}
function printl($x)
{
    for($i=0;$i<strlen($x);$i++)
    {
        echo $x[$i];
    }
}
function today($x)
{
    switch ($x) 
    {
        case 'Monday':
            $day="Lundi";
            break;
        case 'Tuesday':
            $day="Mardi";
            break;
        case 'Wednesday':
            $day="Mercredi";
            break;
        case 'Thursday':
            $day="Jeudi";
            break;
        case 'Friday':
            $day="Vendredi";
            break;
        case 'Saturday':
            $day="Samedi";
            break;
        case 'Sunday':
            $day="Dimanche";
            break;
        default:
            break;
    }
    return $day;
}
function month($x)
{
    switch ($x)
    {
        case '1':
            $month="Janvier";
            break;
        case '2':
            $month="Février";
            break;
        case '3':
            $month="Mars";
            break;
        case '4':
            $month="Avril";
            break;
        case '5':
            $month="Mai";
            break;
        case '6':
            $month="Juin";
            break;
        case '7':
            $month="Juillet";
            break;
        case '8':
            $month="Aout";
            break;
        case '9':
            $month="Septembre";
            break;
        case '10':
            $month="Octobre";
            break;
        case '11':
            $month="Novembre";
            break;
        case '12':
            $month="Decembre";
            break;
        default:
            break;
    }
    return $month;
}
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
function random_date() {
    $y = rand(2020, 2024);
    $m = rand(1, 12);

    if (in_array($m, [1, 3, 5, 7, 8, 10, 12])) {
        $d = rand(1, 31);
    } elseif (in_array($m, [4, 6, 9, 11])) {
        $d = rand(1, 30);
    } elseif ($y % 4 == 0) {
        $d = rand(1, 29);
    } else {
        $d = rand(1, 28);
    }

    if ($m <= 9) {
        $m = "0" . $m;
    }

    if ($d <= 9) {
        $d = "0" . $d;
    }
    if($y==2024)
    $m=rand(1,5);
    $y = strval($y);
    $m = strval($m);
    $d = strval($d);

    return $y . "-" . $m . "-" . $d;
}
function time_difference($time1, $time2)
{
    $dateTime1 = new DateTime($time1);
    $dateTime2 = new DateTime($time2);
    $interval = $dateTime1->diff($dateTime2);
    return $interval->format('%H:%I:%S');
}
function change_time_zone($time, $fromTimeZone, $toTimeZone) {
    $dateTime = new DateTime($time, new DateTimeZone($fromTimeZone));
    $dateTime->setTimezone(new DateTimeZone($toTimeZone));
    return $dateTime->format('Y-m-d H:i:s');
}
?>