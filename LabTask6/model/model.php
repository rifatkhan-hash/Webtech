<?php 
    require 'db_connect.php';


    function chng_password($password) {
        $ezl = connect();
        $sql = "UPDATE user SET Password='$password'";
        $qry = $ezl->query($sql);

        $ezl->close();
    }
     function edit($id, $name, $gender, $dob, $phone, $email) {
        $ezl = connect();
        $sql = "UPDATE user SET Name='$name', Email='$email', Gender='$gender', DateOfBirth='$dob', Contact='$phone' WHERE ID=$id";
        $qry = $ezl->query($sql);

        header("location: /labtask/view/viewprofile.php");
    }
    
	function user($user, $id) {
        $ezl = connect();

        $sql = "UPDATE user SET Username='$user' WHERE ID='$id'";
        $qry = $ezl->query($sql);
        //header('location: /labtassk6/view/viewprofile.php');
        $ezl->close();
    }
	 function delete($id) {
        $ezl = connect();
        $sql = "DELETE FROM user WHERE ID=$id";
        $qry = $ezl->query($sql);

    }

?>