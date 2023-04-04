
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
            <!-- input tag -->
            <input id="searchbar" onkeyup="search_menu()" type="text" name="menu_nom" placeholder="Chercher un menu.."> 
            <div class="bouton">
                <button type="submit" value="submit" name="submit">search</button>  
            </div>
        </div>
        </form>

        <!--search PHP -->
        <?php
 
        
        include 'basedoneesite.php';
        if (isset($_GET['menu_nom'])) {
            $nom = $_GET['menu_nom'];
            
            $query = "SELECT * FROM menu WHERE nom = :nom";
            $stmt = $dbb->prepare($query);
            $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    foreach ($row as $key => $value) {
                        echo $key . ": " . $value . "<br>";
                    }
                    echo "<form method='post'>";
                    echo "<button type='submit' name='deactivate' value='" . $row['id'] . "'>Désactiver Menu</button>";
                    echo "</form>";
                    echo "<hr>";
                }
            } else {
                echo "veuiller entrer une recette existante";
            }
        }
    
        if (isset($_POST['deactivate'])) {
            $id = $_POST['deactivate'];
            $query = "DELETE FROM menu WHERE id = :id";
            $stmt = $dbb->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                echo "Menu supprimé avec succès";
            } else {
                echo "Une erreur s'est produite lors de la suppression du menu";
            }
        }

  
?>

        <div class="flex_center admin_change">
            <h2>NOS MENUS</h2>
        </div>
        <div class="formulaire">
            <form action="ajouter.php"  method='POST'>
                <div class="bloc_forme" id="bloc_nom">
                  <input class="bloc_form" type="text" id="nom" name="menu_nom" placeholder="Nom">
                </div>
              
                <div class="bloc_forme" id="bloc_entree">
                  <input class="bloc_form" type="Text" id="entree" name="menu_entree" placeholder="Entrée">
                </div>
              
                <div class="bloc_forme" id="bloc_plat">
                    <input class="bloc_form" type="text" id="plat" name="menu_plat" placeholder="Plat">
                  </div>
                
                <div class="bloc_forme" id="bloc_dessert">
                    <input class="bloc_form" type="Text" id="dessert" name="menu_dessert" placeholder="Dessert">
                </div>

                <div class="bloc_forme" id="bloc_boisson">
                    <input class="bloc_form" type="text" id="boisson" name="menu_boisson" placeholder="Boisson">
                </div>
                
                <div class="bloc_forme" id="bloc_tarif">
                    <input class="bloc_form" type="Text" id="tarif" name="menu_tarif" placeholder="Tarif">
                </div>
                
                <div class="bloc_forme buttons">
                    <button class="btn btn_admin" type="submit">Ajouter</button>
                </div>
              </form>
        </div>
    </section>
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