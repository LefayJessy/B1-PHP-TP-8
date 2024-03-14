<?php

	// Exercice 1
	function getCode( $produit ){
		list( $code , $nom , $prixUnit , $promo ) = explode( ":" , $produit ) ;
		return $code ;
	}
	
	// Exercice 2
	function getNom( $produit ){
		list( $code , $nom , $prixUnit , $promo ) = explode( ":" , $produit ) ;
		return $nom ;
	}
	
	// Exercice 3
	function estEnPromo( $produit ){
		list( $code , $nom , $prixUnit , $promo ) = explode( ":" , $produit ) ;
		
		if( $promo == 0 ){
			return $promo ;
		}
		else {
			return $promo ;
		}
	}

	// Exercice 4
	function estUnPetitPrix($produit, $petitPrix)
	{
	    list($code, $nom, $prixUnit, $promo) = explode(":", $produit);

	    if ($prixUnit < $petitPrix) {
	        return true;
	    } else {
	        return false;
	    }
	}

	// Exercice 5
	function calculerPrixPromo($produit)
	{
	    list($code, $nom, $prixUnit, $promo) = explode(":", $produit);

	    $prixPromo = $prixUnit - ($prixUnit * $promo / 100);

	    return $prixPromo;
	}

	// Exercice 6
	function genererListeHTML( $produit , $nomFichier = "" ){
		list( $code , $nom , $prixUnit , $promo ) = explode( ":" , $produit ) ;
		
		$html = <<<FIN_HTML
		
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>Asla</title>
</head>
<body>
	<h1>$nom</h1>
	<ul>
		<li>Prix : $prixUnit €</li>
		<li>Promotion : $promo %</li>
	</ul>
</body>

FIN_HTML;
		
		if( $nomFichier != "" ){
			$dest = fopen( "$nomFichier.html" , "w" ) ;	# Ouverture du fichier en mode écriture
			fwrite( $dest , $html ) ;					# Écriture de la chaîne dans le fichier
			fclose( $dest ) ;							# Fermeture du fichier
		}
			
		return $html ;
	}


	// Exercice 7
	function genererTableHTML($produit, $nomFichier = "")
	{
	    list($code, $nom, $prixUnit, $promo) = explode(":", $produit);

	    $html = <<<FIN_HTML
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Asla</title>
        <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>

<body>
    <h1>$nom</h1>
    <table border="1">
        <tr>
            <th>Code</th>
            <th>Nom</th>
            <th>Prix Unit</th>
            <th>Promotion</th>
        </tr>
        <tr>
            <td>$code</td>
            <td>$nom</td>
            <td>$prixUnit €</td>
            <td>$promo %</td>
        </tr>
    </table>
</body>

FIN_HTML;

	    if ($nomFichier != "") {
	        $filename = "$nomFichier-$code.html";
	        $dest = fopen($filename, "w");
	        fwrite($dest, $html);
	        fclose($dest);
	    }

	    return $html;
	}

	# Fonction principale
	function mainTest()
	{
	    $produitTest1 = "178:Dentifrice fraise:15:10";
	    $produitTest2 = "179:Dentifrice au sel marin:8.9:0";

	    // Exercice 1
	    echo "\n1) Code d'un produit -------------------------------------\n";
	    // Produit 1
	    $codeProduit1 = getCode( $produitTest1 ) ;
	    echo "Code du produit 1 : $codeProduit1\n" ;
	    // Produit 2
	    $codeProduit2 = getCode( $produitTest2 ) ;
	    echo "Code du produit 2 : $codeProduit2\n" ;


	    // Exercice 2
	    echo "\n2) Nom d'un produit -------------------------------------\n";

	    $nomProduit1 = getNom( $produitTest1 ) ;
	    echo "Nom du produit 1 : $nomProduit1\n";

	    $nomProduit2 = getNom( $produitTest2 ) ;
	    echo "Nom du produit 2 : $nomProduit2\n";

	    // Exercice 3
	    echo "\n3)   Produit en promotion -------------------------------------\n";

	    if( estEnPromo( $produitTest1 ) == TRUE ){
	        echo "Le produit $nomProduit1 est en promotion.\n" ;
	    }
	    else {
	        echo "Le produit $nomProduit1 n'est pas en promotion.\n" ;
	    }

	    if( estEnPromo( $produitTest2 ) == TRUE ){
	        echo "Le produit $nomProduit2 est en promotion.\n" ;
	    }
	    else {
	        echo "Le produit $nomProduit2 n'est pas en promotion.\n" ;
	    }

	    // Exercice 4
	    echo "\n4) Vendu à un petit prix ? -------------------------------------\n";

	    if( estUnPetitPrix( $produitTest1 , 10 ) == TRUE ){
	        echo "Le produit $nomProduit1 est proposé à un petit prix.\n" ;
	    }
	    else {
	        echo "Le produit $nomProduit1 n'est pas proposé à un petit prix.\n" ;
	    }

	    if( estUnPetitPrix( $produitTest2 , 10 ) == TRUE ){
	        echo "Le produit $nomProduit2 est proposé à un petit prix.\n" ;
	    }
	    else {
	        echo "Le produit $nomProduit2 n'est pas proposé à un petit prix.\n" ;
	    }

	    // Exercice 5
	    echo "\n5) Promotion appliquée -------------------------------------\n";

	    if( estEnPromo( $produitTest1 ) == TRUE ){
	        $prixPromo1 = calculerPrixPromo( $produitTest1 ) ;
	        echo "Le produit $nomProduit1 est proposé au prix promotionnel de $prixPromo1 €\n" ;
	    }
	    else {
	        echo "Pas de promotion pour le produit $nomProduit1 n'est pas en promotion.\n" ;
	    }

	    if( estEnPromo( $produitTest2 ) == TRUE ){
	        $prixPromo2 = calculerPrixPromo( $produitTest2 ) ;
	        echo "Le produit $nomProduit2 est proposé au prix promotionnel de $prixPromo2 €\n" ;
	    }
	    else {
	        echo "Pas de promotion pour le produit $nomProduit2.\n" ;
	    }

	    // Exercice 6
	    echo "\n6.a) Code HTML Produit 1 -------------------------------------\n";
	    $codeHTML = genererListeHTML( $produitTest1 ) ;
	    echo "Code HTML généré :\n$codeHTML\n" ;

	    echo "\n6.b) Code HTML Produit 2 -------------------------------------\n";
	    $codeHTML = genererListeHTML( $produitTest2 , "vueProduitListe_Produit" ) ;
	    echo "Code HTML généré :\n$codeHTML\n" ;

	    // Exercice 7
	    echo "\n7.a) Produit 1 -------------------------------------\n";
	    $codeHTML = genererTableHTML($produitTest1, "vue-produit");
	    echo "Code HTML généré :\n$codeHTML\n";

		echo "\n7.b) Produit 2 -------------------------------------\n";
	    $codeHTML = genererTableHTML($produitTest2, "vue-produit");
	    echo "Code HTML généré :\n$codeHTML\n";
	}

	# Programme Principal
	mainTest();
?>
