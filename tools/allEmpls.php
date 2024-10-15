<!DOCTYPE html>
<html>
    <head>
        <style>
            .center
            {
                width: 600px;
                margin: auto;
            }
            .left
            {
                text-align: left;
            }
            .large_box
            {
                width: 98%;
            }
            table,th,tr 
            {
                border-collapse: collapse;
                border: 1px solid black;
            }
        </style>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1 align="center">Ajout d'un employé</h1>
        <div style="font-family:Calibri;font-size:15px;" align="center">
            <form action="valAddEmpl.php" method="post">
                <table col>
                <tr align="center">
                    <th>
                        <label for="lname">nom</label>
                    </th>
                    <th>
                        <label for="fname">Prénom</label>
                    </th>
                </tr>
                <tr align="center">
                    <th>
                        <p name="prenom"></p>
                    </th>
                    <th>
                        <input type="text" name="nom" require>
                    </th>
                </tr>
                <tr align="center">
                    <th>
                        <label for="sex">Sexe</label>
                    </th>
                    <th>
                        <label for="Date de naissance">Date de naissance</label>
                    </th>
                </tr>
                <tr align="center">
                    <th>
                        <select name="sexe" class="large_box" require>
                            <option name="default">Selectionez un choix</option>
                            <option name="Male">M</option>
                            <option name="Female">F</option>
                    </th>
                    <th>
                        <input type="date" name="naissance" require>
                    </th>
                </tr>
                <tr align="center">
                    <th colspan="2">
                        <label for="adresse">Adresse</label>
                    </th>
                </tr>
                <tr align="center">
                    <th colspan="2">
                        <input type="text" name="adresse" class="large_box" require>    
                    </th>
                </tr>
                <tr align="center">
                    <th>
                        <label for="service">Service</label>
                    </th>
                    <th>
                        <select name="service" class="large_box" require>
                            <option name="default">Selectionez un choix</option>
                            </option>
                        </select>
                    </th>
                </tr>
                <tr>
                    <th colspan="2">
                        <button type="submit">Ajouter</button>
                    </th>
                </tr>
            </table>
            </form>
        </div>
    </body>
</html>
