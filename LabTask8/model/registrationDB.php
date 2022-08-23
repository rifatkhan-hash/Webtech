<?php
    require 'db_connect.php';

    function insert_user($name, $email,$gender, $dob, $phone, $username, $password) {
        $ezl = connect();

        $sql = "INSERT INTO user(Name, Email, Gender, DateOfBirth, Contact, Username, Password) VALUES ('$name', '$email','$gender', '$dob', '$phone', '$username', '$password')";

        if($ezl->query($sql)) {
            header("location: /labtask6/view/login.php");
            setcookie('msg', '<b>✅ Registration Successful</b>', time() + 1, '/');
        }
        else {
            echo "Error: " . $sql . "<br>" . $ezl->error;
        }

        $ezl->close();
    }
    
?>