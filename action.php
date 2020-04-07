<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'int301') or die('Database error');
    if(isset($_POST['submit'])) {
        
        $fn = $_POST['first_name'];
        $ln = $_POST['last_name'];
        $email = $_POST['email'];

        $image = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        $folder = 'uploaded_image/'.$image;

        $sql = "insert into data(first_name, last_name, email, image) values ('$fn', '$ln', '$email', '$image')";
        mysqli_query($conn, $sql);
        move_uploaded_file($temp, $folder);
        $_SESSION['message'] = 'User added succesffully!';
 
    } else {
        $_SESSION['message'] = 'something went wrong...';
    }
    mysqli_close($conn);
    header("location: index.php");
?>