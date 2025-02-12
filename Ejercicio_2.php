<?php
require_once'Config.php';
try{
    $conn = new PDO("mysql:host = $host;dbname=$dbname", $username, $password);

    $consulta = "SELECT title,description,release_year,special_features FROM film limit 5";
    $stnt = $conn->query($consulta);
    $film = $stnt->fetchAll(PDO::FETCH_ASSOC);
    echo "conectado";
}catch(PDOException $pe){
    die("No se pudo conectar a la siguiente base de datos $dbname :" . $pe->getMessage());

}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>


        <?php
            foreach($film as $films){
                echo "<br>";
                echo "<hr>";
                    echo "<div class='card' style='width: 18rem;'>";
                        echo "<img src='...' class='card-img-top' alt='...'>";
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>" . $films['title'] . "</h5>";
                        echo "<p class='card-text'>" . $films['description'] . "</p>";
                        echo "<p class='card-text'>" . $films['release_year'] . "</p>";
                        echo "<p class='card-text'>" . $films['special_features'] . "</p>";
                        echo "<a href='#' class='btn btn-primary'>ASHI</a>";
                    echo "</div>";
                echo "</div>";
            }

        ?>
</body>
</html>