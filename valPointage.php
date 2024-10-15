<?php
require "fonctions.php";
require "connexion.php";
require "constants.php";
$id = $_POST["id"];
if ($id=="")
{
    echo "<script>alert('Veuillez saisir un identifiant!')</script>";
    sleep(0.1);
    echo "<script>window.location.href='Pointage.html';</script>";
    die();
}
$id_check="SELECT id_emp FROM employe WHERE id_emp = '$id'";
$result_id_check=$con->query($id_check);
if($result_id_check->num_rows==0)
{
    echo "<script>alert('Veuillez saisir un identifiant valide!')</script>";
    sleep(0.1);
    echo "<script>window.location.href='Pointage.html';</script>";
    die();
}
$date = date("Y-m-d H:i:s");
$date=change_time_zone($date,'Etc/GMT-2','Etc/GMT-1');
$check_exit = "SELECT emp_id FROM pointage WHERE emp_id = '$id' AND date_fin IS NULL";
$result_check_exit = $con->query($check_exit);
$m=month(date("m"));
$d=today(date("l"));
$j=date("d");
$time = date("H:i:s");
if ($result_check_exit->num_rows>0)
{
    $update_exit = "UPDATE pointage SET date_fin = '$date' WHERE emp_id = '$id' AND date_fin IS NULL";
    if ($con->query($update_exit))
    {
        echo "<script>alert('Sortie enregistrée le $d $j $m à $time !')</script>";
    }
    else
    {
        echo "Erreur lors de la mise à jour de l'heure de sortie: " . $con->error;
    }
} 
else
{
    $insert_entry = "INSERT INTO pointage (emp_id, date_debut) VALUES ('$id', '$date')";
    if ($con->query($insert_entry)) {
        echo "<script>alert('Entrée enregistrée le $d $j $m à $time !')</script>";
    } else {
        echo "Erreur lors de l'enregistrement de l'heure d'entrée: " . $con->error;
    }
}
$sql="SELECT heure_debut,heure_fin FROM etat WHERE id_emp = '$id'";
$result=$con->query($sql);
$row=$result->fetch_assoc();
$time=date("h:i:s");
$time=time_difference($time,"01:00:00");
{
    if($row["heure_debut"]<$time);
    {
        $date = date("Y-m-d");
        $date=change_time_zone($date,'Etc/GMT-2','Etc/GMT-1');
        if(time_difference($time,$row["heure_debut"])>="00:15:00")
        {
            $tranche=50;
        }
        else if(time_difference($time,$row["heure_debut"])>="00:30:00")
        {
            $tranche=100;
        }
        else if(time_difference($time,$row["heure_debut"])>="00:45:00")
        {
            $tranche=150;
        }
        else
        {
            $tranche=200;
        }
        $sql="insert into sanctions(id_emp,date,tranche) values ($id,'$date',$tranche)";
        $con->query($sql);
        $y=date("y");
        $m=date("m");
        $sql="update salaire set montant=montant-$tranche where date='$y-$m'";
        $con->query($sql);
    }
}
sleep(0.1);
echo "<script>window.location.href='Pointage.html';</script>";
die();
?>