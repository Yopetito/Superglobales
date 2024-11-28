<?php
session_start();

function getTotalArticles() {
    $nbArticles = 0;
    if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
        echo "";
    }else {
        foreach($_SESSION['products'] as $index => $product){
            $nbArticles+= $product['qtt'];
        }
        return $nbArticles;
    }
}

function factureProduit() {
    if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
        echo "<p>Aucun produit en session...</p>";
    } 
    else {
        echo "<table>",
                "<thead>",
                    "<tr>",
                        "<th>#</th>",
                        "<th>Nom</th>",
                        "<th>Prix</th>",
                        "<th>Quantité</th>",
                        "<th>Total</th>",
                    "</tr>",
                "</thead>",
                "<tbody>";
        $totalGeneral = 0;
        foreach($_SESSION['products'] as $index => $product){
            echo "<tr>",
                "<th>".$index."</th>",
                "<th>".$product['name']."</th>",
                "<th>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</th>",
                "<th>".$product['qtt']."</th>",
                "<th>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</th>",
                "<th><a href='traitement.php?action=up-qtt&id=$index'>+</a></th>",
                "<th><a href='traitement.php?action=down-qtt&id=$index'>-</a></th>",
                "<th><a href='traitement.php?action=delete&id=$index'>Supprimer Produit</a></th>",
                "</tr>";
        $totalGeneral+= $product['total']; 
        }
        echo "<tr>",
                "<td colspan=4>Total général: </td>",
                "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                "</tr>",
                "<tr>",  
                "<td colspan=3>Nombre d'articles:</td>",
                "<td><strong>".getTotalArticles()."</strong></td>",
                "<td><a href='traitement.php?action=clear'>Vider le panier</a></td>",
            "</tr>",
            "</tbody>",
            "</table>";
    }
}

?>