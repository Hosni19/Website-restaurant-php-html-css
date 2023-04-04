<!DOCTYPE html>
<html lang="fr">
<?php include 'basedoneesite.php'; ?>

<head>
    <meta charset="utf-8">

    <title>Food and Drink</title>
    <meta name="description" content="Description de la page">

    <!-- Feuille style de CSS -->
    <link rel="stylesheet" href="css/style.css">
    </link>

    <link rel="icon" href="favicon.ico">

    <!-- FONT -->


</head>

<body class="bodyvisiteur">
    <header>
        <nav class="container flex-container navvisiteur">
            <div class="logo">
                <img src="images/food-and-drink 2.svg" alt="logo">
            </div>
            <div class="links">
                <ul class="flex-container">
                    <li><a class="color" href="#">Accueil</a></li>
                    <li><a class="color" href="#">Menu</a></li>
                    <li><a class="color" href="#">Nos producteurs</a></li>
                    <li><a class="color" href="#">Nos références</a></li>
                    <li><a class="color" href="#">Contact</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <section id="hero" class="container flex-container">
            <div class="herotexte">
                <div>
                    <h1 class="color" >Enjoy <span>Delicious </br>
                            Food </span>in Your </br>
                        Healthy Life </h1>
                    <p class="color">Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit.</br> Cras ante ante, Squid Game meilleur série,
                        porttitor eu arcu. Curabitur vitae luctus leo. Nullam
                        pellentesque eros tellus,</br> dictum pharetra urna
                        rhoncus vitae. Quoi ? Feur.</p>
                </div>
            </div>
            <div class="heroboximg">
                <img class="heroimg" src="images/pngegg (2).png" alt="imghero">
            </div>
        </section>

        <!-- MENU 1 -->
        <section class="container">
                <div>
                    <h2 class="color">NOS MENUS</h2>
                </div>
                <div class="menu">
                    <div class="menuboximg">
                        <img class="menuimg" src="images/des-plats-équiliobrés-et-colorés.jpg" alt="imgmenu">
                    </div>
                    <div>
                    <?php
         
                    $st = $dbb->prepare("select * from menu");
                    $st->execute();
                    $data = $st->fetchAll();
              
                    foreach ($data as $record) {
 
                        $nom = $record['nom'];
                        $tarif = $record['tarif'];
                        $entrée = $record['entrée'];
                        $plat = $record['plat'];
                        $dessert = $record['dessert'];
                        $boisson = $record['boisson'];
                        echo "<h4><span class='menunom color'> Menu $nom : $tarif €</h4>";
                        echo "<li class='color'><span class='menutitre color'> Entrée : " . "<span class='menuligne color'>$entrée</li>";
                        echo "<li class='color'><span class='menutitre color'> Plat : " . "<span class='menuligne color'>$plat</li>";
                        echo "<li class='color'><span class='menutitre color'> Dessert : " . "<span class='menuligne color'>$dessert</li>";
                        echo "<li class='color'><span class='menutitre color'> Boisson : " . "<span class='menuligne color'>$boisson</li>";
                    }                      
                    ?>
                    </div>      
                </div>
            </section>

        </section>

        <!-- NOS PRODUCTEURS LOCAUX -->
        <section class="container nplcon">
            <div>
                <h2 class="color">NOS PRODUCTEURS LOCAUX</h2>
            </div>
            <div class="flex-container npl">
                <img class="imgpl" src="images/amisdelaferme-rennes-livraison-produits fermiers-ferme2.jpg" alt="ImgPL1">
                <img class="imgpl" src="images/jardins-chataignier.jpg" alt="ImgPL2">
                <img class="imgpl" src="images/logo-boucherie-non-coupe-fo-1.png" alt="ImgPL3">
            </div>
        </section>

        <!-- NOS REFERENCES -->
        <section class="container refcon">
            <div>
                <h2 class="color">NOS REFERENCES</h2>
            </div>
            <div class="flex-container ref">
                <img class="imgref" src="images/logo_rouge.png" alt="Imgref1">
                <img class="imgref" src="images/michelin-guide-logo-dark.svg" alt="Imgref2">
                <img class="imgref" src="images/Tripadvisor_lockup_horizontal_secondary_registered.svg" alt="Imgref3">
            </div>
        </section>

        <!-- NOUS TROUVER -->
        <section class="container map">
            <div>
                <h2 class="color">NOUS TROUVER</h2>
            </div>
            <div class="googlemap">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2664.0502240227906!2d-1.6827809490553778!3d48.10926686100967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480ede336647100f%3A0x705cb7733a64bcce!2s3%20Rue%20de%20la%20Chalotais%2C%2035000%20Rennes!5e0!3m2!1sfr!2sfr!4v1677590123253!5m2!1sfr!2sfr" width="100%" height="400" style="border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>

        <!-- FORMULAIRES -->
        <section class="container form">
            <form action="envoi_email.php" id="formulaire" method='POST'>
                <div>
                    <h2 class="color">FORMULAIRES</h2>
                </div>
                <div class="nom">
                    <input type="text" name="nom" placeholder="Nom" minlength="2" maxlength="40">
                </div>
                <div class="mail">
                    <input type="text" name="Email" placeholder="Email" minlength="3" maxlength="60">
                </div>
                <div class="mess">
                    <textarea name="Message" id="message" cols="100" rows="10" placeholder="Message"></textarea>
                </div>
                <div class="bouton">
                    <button type="submit" value="submit" name="submit">Send</button>  
                </div>
        </section>
 <!-- php envoi du mail -->

    </main>

    <footer>
        <section class="footer">
            <div class="container flex-container foot">
                <div class="joindre">
                    <h3>NOUS JOINDRE</h3>
                    <div class="text_footer">
                        <p>3 rue de la Chalotais,<br/>35000 Rennes</p>
                        <p>Tel: 07 84 74 91 29</p>
                    </div>
                </div>
                <div class="footlogo">
                    <img src="images/food-and-drink 2.svg" alt="logo">
                </div>
                <div class="horaires">
                    <h3>NOS HORAIRES</h3>
                    <div class="text_footer">
                        <p>Du lundi au samedi<br/>de 11h00 à 15h00 et de 19h00 à 23h00</p>
                        <p>Le restaurant est fermé le dimanche</p>
                    </div>
                </div>
            </div>
        </section>
    </footer>


    <script src="script.js"></script>
</body>

</html>