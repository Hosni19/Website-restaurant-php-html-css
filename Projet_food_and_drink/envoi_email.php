
<?php

if (isset($_POST['submit'])) {

    $nom = $_POST['nom'];
    $email = $_POST['Email'];
    $sujet = $_POST["Message"];

    $to = 'hosnihamdi9999@gmail.com';
    
    $contenu = "Nom : $nom\nE-mail : $email\nMessage : $sujet";
    $headers = 'De : ' . $email;

    if (empty($nom) || empty($email) || empty($sujet)) {
        echo 'Veuillez remplir tous les champs du formulaire.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Veuillez saisir une adresse e-mail valide.';
    } elseif (strlen($sujet) < 3) {
        echo 'Veuillez saisir un message d\'au moins 3 caractères.';
    } 
    if (mail($to, $sujet, $contenu, $headers)) {
        echo 'Votre message a été envoyé avec succès.';
      } else {
        echo 'Une erreur est survenue lors de l\'envoi de votre message.';
      }
}
?>