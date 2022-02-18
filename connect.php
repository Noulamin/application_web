<?php

    session_start();
    $conn;


    function connect($dbname){
        global $conn;
        $servername = "localhost";
        $username = "root";
        $password = "";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn) {
            echo "Connected seccesfuly." . "<br>";
            return;
        }
        else
        {
            echo "Connection failed." . "<br>";
            return;
        }
    }


    function sign_up(){
        connect("e_class_users");

        global $conn;
        $full_name = $_POST["name"];
        $email = $_POST["email"];
        $password_ = $_POST["password"];
        $c_password = $_POST["c_password"];

        echo 'table : ' . $email_fixed  . "<br>" ;

        try {
            $conn -> query("INSERT INTO `accounts`(`user_name_`, `email_`, `password_`)
                    VALUES ('$full_name','$email','$password_')"
            );

            $_SESSION["message_succes"] = "account created succesfuly."  . "<br>";
            header("Location: index.php");
        } catch (Exception $e) {
           // echo  $e . "<br>";
            $_SESSION["message_error"] = " failed. : $e" . "<br>";
            header("Location: index.php");
        }
    }

    function sign_in(){
        connect("e_class_users");

        global $conn;

        $email =  $_POST["email_"];
        echo 'table : ' . $email  . "<br>" ;

        $password_ = $_POST["password_"];

        try {
            $result = $conn -> query("SELECT * FROM accounts;");

            if ($result->num_rows > 0) {

                $email_found;
                $counter = 1;
                // output data of each row

                while($row = $result->fetch_assoc()) {
                  // echo "name : " . $row["full_name"]. " - email : " . $row["email"]. " passwor : " . $row["password_"]. "<br>";
                    
                    if($row["email_"] == $email)
                    {
                        if($row["password_"] == $password_)
                        {
                            $_SESSION["user_name"] = $row["user_name_"];
                            $_SESSION["user_email"] = $row["email_"];
                            $_SESSION["password"] = $password_;
                            $email_found = $row["email_"];
                            break;
                        }
                        // echo "succesfuly login in"  . "<br>";
                        
                    }
                }

                while($row = $result->fetch_assoc()) {
                    $counter++;
                }

                $_SESSION["student_counter"] = $counter;


                if($email_found != null)
                {
                    if($_POST["check"] == "on")
                    {
                        setcookie("email", $email_found, time() + 3600);
                        setcookie("password", $_SESSION["password"], time() + 3600);
                    }
                    else
                    {
                        setcookie("email");
                        setcookie("password");
                    }
                    
                    header("Location: dashboard.php");
                }
                else
                {
                    $_SESSION["message_error"] = "wrong identity.";
                    header("Location: index.php");
                }
            } 
            else
            {
                    $_SESSION["message_error"] = "no data in database.";
                    header("Location: index.php");
            }
        } catch (Exception $e) {
            $_SESSION["message_error"] = "sign in : $e.";
            header("Location: index.php");
        }
    }

    function save_students_data(){

        $name = $_POST["inp_name"];
        $email_entered = $_POST["inp_email"];
        $phone = $_POST["inp_phone"];
        $enroll = $_POST["inp_enroll"];
        $date = $_POST["inp_date"];

        connect("e_class_users");
        global $conn;

        $conn -> query("INSERT INTO `students`(`Name_`, `Email_`, `Phone_`, `Enroll_Number_`, `Date_of_admission_`)
                        VALUES ('$name','$email_entered','$phone','$enroll','$date');
        ");

        header("Location: dashboard_student.php");
    }


    
    function log_out(){
        session_destroy();
        session_unset();
      //  header('Clear-Site-Data: "cache", "cookies", "storage", "executionContexts"');
        header("Location: index.php");
    }

    

    if(array_key_exists('sign_up', $_POST)) {

        if($_POST["name"] == null || $_POST["email"] == null ||
        $_POST["password"] == null || $_POST["c_password"] == null )
        {
            $_SESSION["message_error"] = "all fields are required.";
            header("Location: index.php");
        }
        else
        {
            if($_POST["password"] != $_POST["c_password"])
            {
                $_SESSION["message_error"] = "password does not match XD.";
                header("Location: index.php");
            }
            else
            {
                sign_up();
            }
        }
    }

    if(array_key_exists('sign_in', $_POST)) {

        if($_POST["email_"] == null || $_POST["password_"] == null)
        {
            //echo "all fields are requires";
            $_SESSION["message_error"] = "all fields are required.";
            header("Location: index.php");
        }
        else
        {
            sign_in();
        }
    }

    if(array_key_exists('log_out', $_POST)) {
        log_out();
    }

    if(array_key_exists('bu_student_save', $_POST)) {
        save_students_data();
    }

?>