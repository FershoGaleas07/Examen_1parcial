<?php
require_once'Config.php';
try{
    $conn = new PDO("mysql:host = $host;dbname=$dbname", $username, $password);

    $consulta = "SELECT * FROM category limit 5";
    $stnt = $conn->query($consulta);
    $categoria = $stnt->fetchAll(PDO::FETCH_ASSOC);
    echo "conectado";
}catch(PDOException $pe){
    die("No se pudo conectar a la siguiente base de datos $dbname :" . $pe->getMessage());

}
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nombre = $_POST['nombre'];
    if($nombre){
        $sql = "INSERT INTO category (name) VALUES ('$nombre')";

        $stmt = $conn->prepare($sql);
        $stmt->execute(["nombre" => $nombre]);
        echo "agregado correctamente";
    }

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
<form action="" method="post">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Escribe Nombre de Categoria: </label>
        <input type="text" name ="ID" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Escribe Nombre de Categoria: </label>
        <input type="text" name ="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Categoria ID</th>
        <th scope="col">Nombre</th>

    </tr>
    </thead>
    <tbody>

    <?php

    foreach($categoria as $categorias){
        echo "<tr>";
        echo "<th scope='row'>".$categorias['category_id']."</th>";
        echo "<td>".$categorias['name']."</td>";
        echo "</tr>";
    }

    ?>


    </tbody>
</table>
</body>
</html>

<?php


?>


























