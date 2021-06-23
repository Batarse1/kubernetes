<?php
$termTitle = $_POST['termTitle'];
$Definitions = $_POST['Definitions'];

//database connection
//database connection
$mysqli = new mysqli('10.244.0.5', "root", "dictionaryPassword", "dictionarydb");

if (mysqli_connect_errno()) {
    printf("Connection failed: %s\n", $mysqli->connect_error);
    exit();
}

$stmt = $mysql->prepare("INSERT INTO dictionary(termTitle, Definitions) values(?, ?)");
$stmt->bind_param("ss", $termTitle, $Definitions);
$stmt->execute();
printf("Term added succesfully\n");
$stmt->close();
$mysql->close();
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Dictionary</title>
</head>

<body class="h-100 d-flex justify-content-center align-items-center">

    <form action="" method="POST" class="container">

        <h4 class="display-4">Add a term</h4>

        <div class="mb-3">
            <label for="termTitle" class="form-label">Term</label>
            <input type="text" class="form-control" id="termTitle" placeholder="Ex: Term" name="termTitle" value="">
        </div>

        <div class="mb-3">
            <label for="Definitions" class="form-label">Definition</label>
            <textarea class="form-control" id="Definitions" rows="5" placeholder="Ex: A word or a phrase that is used to mean a particular thing" name="Definitions" value=""></textarea>
        </div>

        <div class="d-flex justify-content-between">
            <a href="index.php"><button class="btn btn-primary pe-5 ps-5" type="button">Previous</button></a>
            <button type="submit" class="btn btn-primary pe-5 ps-5" type="submit">Add</button>
            <a href="delete.php"><button class="btn btn-primary pe-5 ps-5" type="button">Next</button></a>
        </div>

    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>