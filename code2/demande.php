<?php
require "connexion.php";

$debut = $_POST['date_debut'];
$fin = $_POST['date_fin'];
$id = $_POST['id_emp'];
$statut = 'en attente';

$sql = "SELECT jours_conge FROM conge WHERE id_emp = '$id'";
$result = mysqli_query($connexion, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $jours = $row['jours_conge'];

    $query = "INSERT INTO conge (id_emp, date_debut, date_fin, nbr_jours, statut, jours_conge) VALUES ('$id', '$debut', '$fin', 'nbr_jours', '$statut', '$jours')";
    $insert_result = mysqli_query($connexion, $query);

    if ($insert_result) {
        echo 'Votre demande est bien soumise!';
        header('Location: menu.php');
        exit();
    } else {
        die(mysqli_error($connexion));
    }
} else {
    die("Error fetching jours_conge from database.");
}
?>
