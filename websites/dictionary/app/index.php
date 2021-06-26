<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Dictionary</title>
</head>

<body class="h-100 d-flex justify-content-center align-items-center">

    <div class="container">

        <h4 class="display-4">List of terms</h4>
        
            <div class="overflow-auto" style="max-height: 400px;">
            <?php 

            $mysqli = new mysqli('mysql-service', "root", "dictionaryPassword", "dictionarydb");

            if (mysqli_connect_errno()) {
                printf("Connection failed: %s\n", $mysqli->connect_error);
                exit();
            }

            $query = 'SELECT * FROM dictionary';
            $result = mysqli_query($conn, $query);

            while($row = $result->fetch_array(MYSQLI_ASSOC)){
                echo "<h6 class='display-6'>" . $row["term"] . "</h6>";	
                echo "<p class='lead'>" . $row["definition"] . "</p>";
            }
            ?>

            </div>

        <div class="d-flex justify-content-between">
            <a href="add.php"><button class="btn btn-primary pe-5 ps-5" type="submit">Next</button></a>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>

</html>