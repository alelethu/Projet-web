<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sommets</title>
        <link rel="stylesheet" href="sommets.css">
    </head>
    <body>
        <canvas id="canvas"></canvas>
        <table id="tableau_etiquette">
            <thead>
                <tr>
                    <th>Etiquette</th>
                    <th>Points</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <form  method="post" action="recup_modif.php">
                    <td><input type="text" name="nom_etiquette" placeholder="Nom de l'étiquette" required /></td>
                    <td><label >Position des points</label> : <p id = "positionPoint" name="position_points"></p></td>
                    <td><input type="text" name="description" placeholder="Description" /></td>
                    <td><input type="hidden" id="hiddenPoints" name="coord"></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="text-align: center;"><input id="boutton_envoyer" type="submit" name="Envoyer" value="Valider"></td></form>
                </tr>
            </tfoot>
        </table>
        <script src="sommets.js"></script>
    </body>
</html>