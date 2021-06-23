<?php
    $bookTitle = $_POST['bookTitle'];
    $bookDescription = $_POST['bookDescription'];

    //database connection
    $conn = new mysqli('localhost','root','booksDatabasePassword','booksdb','3306');
    if($conn->connect_error){
        die('Connection failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("INSERT INTO books(bookTitle, bookDescription) values(?, ?)");
        $stmt->bind_param("ss",$bookTitle, $bookDescription);
        $stmt->execute();
        echo "Book added successfully!";
        $stmt->close();
        $conn->close();
    }
?>