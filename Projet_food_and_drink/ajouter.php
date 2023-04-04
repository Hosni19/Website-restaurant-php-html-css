<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
    $dbb = new PDO("mysql:host=$servername; dbname=menu restaurant", $username, $password);

     $dbb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

if (
    isset($_POST['menu_nom']) && isset($_POST['menu_entree']) && isset($_POST['menu_plat']) && isset($_POST['menu_dessert'])
    && isset($_POST['menu_boisson']) && isset($_POST['menu_tarif'])
) {
    $nom = $_POST['menu_nom'];
    $entree = $_POST['menu_entree'];
    $plat = $_POST['menu_plat'];
    $dessert = $_POST['menu_dessert'];
    $boisson = $_POST['menu_boisson'];
    $tarif = $_POST['menu_tarif'];

    if (empty($nom) || empty($entree) || empty($plat) || empty($dessert) || empty($boisson) || empty($tarif)) {
        echo "Veuiller vérifier tous les champs de la formulaire.";
    } elseif (!is_numeric($tarif)) {
        echo 'Vérifier le champ Tarif';
    } else {
        $sql = "INSERT INTO menu (nom, entrée, plat,dessert,boisson,tarif) VALUES (:nom, :entree, :plat, :dessert , :boisson , :tarif)";
        $stmt = $dbb->prepare($sql);

        $stmt->execute(["nom" => $nom, "entree" => $entree, "plat" => $plat, "dessert" => $dessert, "boisson" => $boisson, "tarif" => $tarif]);

        if ($stmt->rowCount()) {
            echo "Menu inséré avec succès!";
        }
    }
}
