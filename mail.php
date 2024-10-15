<?php
$email="othmane2rabat@gmail.com";
$prenom="othmane";
$nom="zrioual";
$mdp="ndjovno";
    mail($email, "Votre mot de passe pour accès à votre compte", "
    Cher/Chère ".$prenom." ".$nom.",

Vous trouverez ci-dessous les informations de connexion à notre compte professionnel:
    Utilisateur : 
    Mot de passe : ".$mdp."
il est recommandé de changer ce mot de passe dès votre première connexion pour des raisons de sécurité. Assurez-vous de choisir un mot de passe robuste et unique pour garantir la sécurité de notre compte.Cordialement");
?>