<?php

/**
 * Pour cet exercice, vous allez utiliser la base de données table_test_php créée pendant l'exo 189
 * Vous utiliserez également les deux tables que vous aviez créées au point 2 ( créer des tables avec PHP )
 */

try {
    /**
     * Créez ici votre objet de connection PDO, et utilisez à chaque fois le même objet $pdo ici.
     */
    $user = 'root';
    $password = '';
    $server = 'localhost';
    $db = 'table_test_php';

    $pdo = new PDO("mysql:host=$server; dbname=$db; charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /**
     * 1. Insérez un nouvel utilisateur dans la table utilisateur.
     */

    // TODO votre code ici.
    $dt = new DateTime();
    $date = $dt->format('Y-m-d H:i:s');

    $sql = "
        INSERT INTO utilisateur VALUES (NULL, 'Blanche', 'Ette', 'blanchette@mail.com', 'mdp' ,'rue noire', 5555, 'Noiraume', '$date')
    ";

    $result = $pdo->exec($sql);
    echo $result;

    /**
     * 2. Insérez un nouveau produit dans la table produit
     */

    // TODO votre code ici.

    $sql1 = "
        INSERT INTO produit VALUES ('sushi', 25.67, 'Du poisson cru', 'DU poisson cru sur du riz qui peut être avarié')
    ";

    $result1 = $pdo->exec($sql1);
    echo $result1;

    /**
     * 3. En une seule requête, ajoutez deux nouveaux utilisateurs à la table utilisateur.
     */

    // TODO Votre code ici.

    $sql3 = "
        INSERT INTO utilisateur 
        VALUES (NULL, 'Valeria', 'LaRouge', 'Rougette@azerty.com', 'qwerty', 'Au château', 666, 'Arcadia', '$date')
               (NULL, 'Ayana', 'Petrisot', 'aya@gmail.com', 'coucou','rue Mahy', 6590, 'Belgique', '$date')
    ";

    $result = $pdo->exec($sql3);

    /**
     * 4. En une seule requête, ajoutez deux produits à la table produit.
     */

    // TODO Votre code ici.
    $sql4 = "
        INSERT INTO produit 
        VALUES (Corbeau empaillé, 155.99, Une compagnie très calme, Ne fait pas caca sur les moquettes ni de bruits)
               (outils de torture, 2.99, Sert à torturer les gens, Petit ouitllages très pratique et peu chère pour torturer les traites et ceux que vous aimez pas)
    ";

    $result = $pdo->exec($sql4);
    /**
     * 5. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux utilisateurs dans la table utilisateur.
     */

    // TODO Votre code ici.

    $pdo->beginTransaction();
    $insert = "INSERT INTO utilisateur VALUES ";

    $sql5 = $insert."(NULL, 'Adèle', 'Blancsec', 'dammourrue@mail.fr', 'supermdp', 'Sur le Titanic', 000, 'Groenland', '$date')";
    $pdo->exec($sql5);

    $sql6 = $insert."(NULL, 'Fraisine', 'pasBonne', 'fraisedaubé@mail.dg', '12345', 'Rue du champ pas frai', 90, 'Pologne', '$date')";
    $pdo->exec($sql6);

    $sql7 = $insert."(NULL, 'petite', 'herbe', 'vientfumer@mail.fr', 'cana', 'rue de la plante', 1300, 'Belgique', '$date')";
    $pdo->exec($sql7);

    $pdo->commit();


    /**
     * 6. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux produits dans la table produit.
     */
    $pdo->beginTransaction();
    $insert2 = "INSERT INTO produit VALUES ";

    $sql8 = $insert2."(NULL, 'riz', 3.05, 'du riz lonng pas collant', 'ne colle pas assez et ne sert pas à faire les sushis')";
    $pdo->exec($sql8);

    $sql9 = $insert2."(NULL, 'ordinateur', 600€, 'pas puissant', 'idéal pour du traitement de texte, mais pas le gaming.')";
    $pdo->exec($sql9);

    $sql10 = $insert2."(NULL, 'bébé', 2000, 'bon pour le don d\'organe', 'Petit bébé à vendre nourrit avec du bio, idéal pour un don d\'organe au marché noir')";
    $pdo->exec($sql10);

    $pdo->commit();
}
catch (PDOException $e) {
    echo "Une erreur est survenue :" . $e->getMessage();
}