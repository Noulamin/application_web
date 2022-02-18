<?php
    $conn;
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "e_class_users";
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    $id = $_GET['id'];
    $conn -> query("DELETE FROM students where id = '$id'");
    header('location: dashboard_student.php');
?>