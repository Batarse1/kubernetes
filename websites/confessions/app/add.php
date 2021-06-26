<?php
if(isset($_POST['submitButton'])){
    $confessionTitle = $_POST['confessionTitle'];
    $Confession = $_POST['Confession'];

    //database connection
    $mysqli = new mysqli('mysql-service', "root", "confe", "confessiondb");

    if (mysqli_connect_errno()) {
        printf("Connection failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $stmt = $mysqli->prepare("INSERT INTO confessions(confessionTitle, Confession) values(?, ?)");
    $stmt->bind_param("ss", $confessionTitle, $Confession);
    $stmt->execute();    
    $stmt->close();
    $mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Confessions</title>
</head>

<body class="h-100 d-flex justify-content-center align-items-center">

    <form action="" method="POST" class="container">

        <h4 class="display-4">Add a confession</h4>

        <div class="mb-3">
            <label for="confessionTitle" class="form-label">Confession title</label>
            <input type="text" class="form-control" id="confessionTitle" placeholder="Ex: Amy" name="confessionTitle" value="">
        </div>

        <div class="mb-3">
            <label for="Confession" class="form-label">Confession</label>
            <textarea class="form-control" id="Confession" rows="5" placeholder="Ex: I had a crush on this girl Amy for a long time. One night I was drunk and texted her and told her how much I liked her. She just replied with LMFAO." name="Confession" value=""></textarea>
        </div>

        <div class="d-flex justify-content-between">
            <a href="index.php"><button class="btn btn-primary pe-5 ps-5" type="button">Previous</button></a>
            <button type="submit" class="btn btn-primary pe-5 ps-5" type="submit" name="submitButton">Add</button>
            <a href="delete.php"><button class="btn btn-primary pe-5 ps-5" type="button">Next</button></a>
        </div>

    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>