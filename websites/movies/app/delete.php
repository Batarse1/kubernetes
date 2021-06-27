<?php
if(isset($_POST['submitButton'])){
    $movieTitle = $_POST['movieTitle'];
    $Summary = $_POST['Summary'];

    //database connection
    $mysqli = new mysqli('moviedb-service', "root", "movie", "moviedb");

    if (mysqli_connect_errno()) {
        printf("Connection failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $stmt = $mysqli->prepare("DELETE FROM movie WHERE movieTitle=?");
    $stmt->bind_param("s", $movieTitle);
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

    <title>Movies</title>
</head>

<body class="h-100 d-flex justify-content-center align-items-center">

    <form action="" method="POST" class="container">

        <h4 class="display-4">Delete a movie</h4>

        <div class="mb-3">
            <label for="movieTitle" class="form-label">Movie title</label>
            <input type="text" class="form-control" id="movieTitle" placeholder="Ex: Harry potter and the philosopher's stone" name="movieTitle" value="">
        </div>

        <div class="d-flex justify-content-between">
            <a href="add.php"><button class="btn btn-primary pe-5 ps-5" type="button">Previous</button></a>
            <button class="btn btn-primary pe-5 ps-5" type="submit" name="submitButton">Delete</button>
        </div>

    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>