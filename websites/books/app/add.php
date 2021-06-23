<?php
$bookTitle = $_POST['bookTitle'];
$bookDescription = $_POST['bookDescription'];

//database connection
//database connection
$mysqli = new mysqli('10.244.0.3', "root", "bookPassword", "bookdb");

if (mysqli_connect_errno()) {
    printf("Connection failed: %s\n", $mysqli->connect_error);
    exit();
}

$stmt = $mysql->prepare("INSERT INTO book(bookTitle, bookDescription) values(?, ?)");
$stmt->bind_param("ss", $bookTitle, $bookDescription);
$stmt->execute();
printf("Book added succesfully\n");
$stmt->close();
$mysql->close();
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Books</title>
</head>

<body class="h-100 d-flex justify-content-center align-items-center">

    <form action="" method="POST" class="container">

        <h4 class="display-4">Add a book</h4>

        <div class="mb-3">
            <label for="bookTitle" class="form-label">Book title</label>
            <input type="text" class="form-control" id="bookTitle" placeholder="Ex: Harry potter and the philosopher's stone" name="bookTitle" value="">
        </div>

        <div class="mb-3">
            <label for="bookDescription" class="form-label">Description</label>
            <textarea class="form-control" id="bookDescription" rows="5" placeholder="Ex: Harry Potter and the Philosopher's Stone (released in the United States and India as Harry Potter and the Sorcerer's Stone) is a 2001 fantasy film directed by Chris Columbus and distributed by Warner Bros. Pictures, based on J. K. Rowling's 1997 novel of the same name." name="bookDescription" value=""></textarea>
        </div>

        <div class="d-flex justify-content-between">
            <a href="index.html"><button class="btn btn-primary pe-5 ps-5" type="button">Previous</button></a>
            <button type="submit" class="btn btn-primary pe-5 ps-5" type="submit">Add</button>
            <a href="delete.html"><button class="btn btn-primary pe-5 ps-5" type="button">Next</button></a>
        </div>

    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>