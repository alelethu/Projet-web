<!DOCTYPE html>
<html>
<head>
    <title>Image venant d'un catalogue</title>
</head>
<body>
    <?php 
    session_start();
    require('dbconfig.php'); 

    // Connexion à la base de données avec MySQL
    $connexion = new mysqli($dbConn['host'], $dbConn['user'], $dbConn['pass'], $dbConn['name']);
    if ($connexion->connect_error) {
        die("Connexion non établie : " . $connexion->connect_error);
    }

    $catalog = 1; //$_POST['catalogId'];

    // Préparation et exécution de la requête
    $statement = $connexion->prepare("SELECT catalogimage.imageId, image.name FROM catalogimage INNER JOIN image ON catalogimage.imageId = image.id WHERE catalogimage.catalogId = ? ORDER BY catalogimage.position ASC;");
    $statement->bind_param("s", $catalog); // Lier le paramètre
    $statement->execute(); // Exécuter la requête

    // Récupérer les résultats
    $result = $statement->get_result();
    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    $statement->close();
    $connexion->close();
    ?>

    <script>
        var rows = <?php echo json_encode($rows); ?>;
        // Boucle pour itérer sur le tableau de données
        for (var i = 0; i < rows.length; i++) {
            // création d'un bouton pour chaque image du catalogue pour le moment
            const form = document.createElement('form');
            form.action = 'modif.php'; 
            form.method = 'get';       
            form.target = '_self';     
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'image';
            hiddenInput.value = rows[i].name; 
            const submitButton = document.createElement('input');
            submitButton.type = 'submit';
            submitButton.name = 'Test';
            submitButton.id = 'boutonTest';  
            submitButton.value = "image " +  rows[i].imageId;    
            form.appendChild(hiddenInput);
            form.appendChild(submitButton);
            document.body.appendChild(form);
        }
    </script>

</body>