<!DOCTYPE html>
<html lang="en">
<?php include 'basedoneesite.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Projet Dev</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="headeradmin">
        <nav class="nav">
            <div class="logo" id="head">
                <img src="images/food-and-drink.svg" alt="">
            </div>
            <div class="admin_header">
                <ul>
                    <a href="admin.php">
                        <li>Admin Page</li>
                    </a>
                    <a href="editer.php">
                        <li>Modifier</li>
                    </a>
                </ul>
            </div>
            <div class="log-in">
                <img src="images/log-in.svg" alt="">
            </div>
        </nav>
    </header>
    <section class="change_admin_page">
        <form action="" method="get">
         <div class="flex_center search_bar">
            <input id="searchbar" onkeyup="search_menu()" type="text" name="search" placeholder="Chercher un menu..">  
                <div class="bouton">
                    <button type="submit" value="submit" name="submit">search</button> 
                </div>
            </div>
        </form>
    </section>


<?php
include 'basedoneesite.php';

if (isset($_GET['search'])) {
    $nom = $_GET['search'];
    
    $query = "SELECT * FROM menu WHERE nom = :nom";
    $stmt = $dbb->prepare($query);
    $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<form class='container formulaire' method='post'>";
            echo "<label for='nom'>Nom:</label>";
            echo "<input class='bloc_form' type='text' id='nom' name='nom' value='" . $row['nom'] . "'><br><br>";
            echo "<label for='entree'>Entrée:</label>";
            echo "<input class='bloc_form' type='text' id='entree' name='entree' value='" . $row['entrée'] . "'><br><br>";
            echo "<label for='plat'>Plat:</label>";
            echo "<input class='bloc_form' type='text' id='plat' name='plat' value='" . $row['plat'] . "'><br><br>";
            echo "<label for='dessert'>Dessert:</label>";
            echo "<input class='bloc_form' type='text' id='dessert' name='dessert' value='" . $row['dessert'] . "'><br><br>";
            echo "<label for='boisson'>Boisson:</label>";
            echo "<input class='bloc_form' type='text' id='boisson' name='boisson' value='" . $row['boisson'] . "'><br><br>";
            echo "<label for='tarif'>Tarif:</label>";
            echo "<input class='bloc_form' type='text' id='tarif' name='tarif' value='" . $row['tarif'] . "'><br><br>";
            echo "<input class='bloc_form' type='hidden' name='id' value='" . $row['id'] . "'>";
            echo "<div class='bloc_forme buttons'>";
            echo "<button class='btn btn_admin' type='submit' name='edit'>Edit</button>";
            echo "</div>";
            echo "</form>";
        }
    } else {
        echo "veuillez entrer un menu existant";
    }
}


if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $entree = $_POST['entree'];
    $plat = $_POST['plat'];
    $dessert = $_POST['dessert'];
    $boisson = $_POST['boisson'];
    $tarif = $_POST['tarif'];
    
    $query = "UPDATE menu SET nom = :nom, entrée = :entree, plat = :plat, dessert = :dessert, boisson = :boisson, tarif = :tarif WHERE id = :id";
    $stmt = $dbb->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
    $stmt->bindParam(':entree', $entree, PDO::PARAM_STR);
    $stmt->bindParam(':plat', $plat, PDO::PARAM_STR);
    $stmt->bindParam(':dessert', $dessert, PDO::PARAM_STR);
    $stmt->bindParam(':boisson', $boisson, PDO::PARAM_STR);
    $stmt->bindParam(':tarif', $tarif, PDO::PARAM_STR);
    
    if ($stmt->execute()) {
        echo "Menu modifié avec succès";
    } else {
        echo "Erreur lors de la modification du menu";
    }
}

?>

    <footer class="flex_center">
        <div class="flex-container">
            <div class="bloc nous_joindre">
                <div>
                    <h3>NOUS JOINDRE</h3>
                    <div class="text_footer">
                        <p>3 rue de la Chalotais,<br/>35000 Rennes</p>
                        <p>Tel: 07 84 74 91 29</p>
                    </div>
                </div>
            </div>
            <div class="bloc logo">
                <img src="images/food-and-drink.svg" alt="">
            </div>
            <div class="bloc nos_horaire">
                <div>
                    <h3>NOS HORAIRES</h3>
                    <div class="text_footer">
                        <p>Du lundi au samedi<br/>de 11h00 à 15h00 et de 19h00 à 23h00</p>
                        <p>Le restaurant est fermé le dimanche</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </body>
</html>