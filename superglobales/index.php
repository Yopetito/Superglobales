<?php
    session_start();
    ob_start();
    require("functions.php");

$title = "Ajout de produit";
// ================Pour le titre si je veux ajouter une couche de complexité
// ob_start();
// echo "Ajout de produit";
// $title = ob_get_clean();
//================ commencer le ob_start du content:
// ob_start();
?>

<!--FORM-->
<nav class="navbar">
        <button onclick="window.location.href='recap.php';">Recap</button>
</nav>
<h1>Ajouter un produit</h1>
<form action="traitement.php?action=add" method="post">
    <p>
        <label>
            Nom du produit:
            <input type="text" name="name">
        </label>
    </p>
    <p>
        <label>
            Prix du produit:
            <input type="number" step="any" name="price">
        </label>
    </p>
    <p>
        <label>
            Quantité désirée:
            <input type="number" name="qtt" value="1">
        </label>
    </p>
    <p>
        <input type="submit" name="submit" value="Ajouter le produit">
    </p>
</form>
<p class="count">
    Articles dans le panier: 
    <?php
    echo getTotalArticles();
    echo showProductAdd();
    ?>  
</p>


<?php
$content = ob_get_clean();

require_once "template.php"; 
?>