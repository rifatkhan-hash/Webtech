<?php
 require '../model/registrationDB.php';
    session_start();  
	$name = $gender = $dob = $phone = $email =  $username = $password = $conpassword = "";
    
    $dobErr = $emailErr = $usernameErr = $passwordErr =  "";
	$isValid = true;
	$isChecked = $isEmpty = false;

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$isChecked = true;
        function test($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
		
        $name = test($_POST["name"]);
		$email = test($_POST["email"]);
		$gender = test($_POST["gender"]);
        $dob = test($_POST["dob"]);
        $phone = test($_POST["phone"]);
        $username = test($_POST["username"]);
        $password = test($_POST["password"]);
        $conpassword = test($_POST["conpassword"]);
        $year = date("Y") - intval($dob);

        if(empty($name)) {
            $isValid = false;
            $isEmpty = true;
        }


        if(empty($_POST["gender"])) {
            $isValid = false;
            $isEmpty = true;
        }
        else
            $gender = $_POST["gender"];

        if(empty($dob)) {
            $isValid = false;
        }

        else if ($year < 18) {
            $isValid = false;
            $dobErr = "<br>❌You are not old enough, Must be 18 or older";
        }


        if(empty($email)) {
            $isValid = false;
            $isEmpty = true;
        }

        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $isValid = false;
            $emailErr = "<br>❌Invalid email format";
        }

        if(empty($username)) {
            $isValid = false;
            $isEmpty = true;
        }

        if(strlen($username) > 8) {
            $isValid = false;
            $usernameErr = "<br>❌Username up to 8 characters long";
        }

        if(empty($password)) {
            $isValid = false;
            $isEmpty = true;
        }

        else if(strlen($password) < 8) {
            $isValid = false;
            $passwordErr = "<br>❌Password must be at least 8 characters long";
        }

        if(empty($conpassword)) {
            $isValid = false;
            $isEmpty = true;
        }

        if($password != $conpassword) {
            $isValid = false;
            $passwordErr = "<br>❌Password not matched";
        }

        if($isValid and $isChecked){
            // data insertion
            define("file", 'C:/xampp/htdocs/labtask6/model/tempUser.json');
            $handle = fopen(file, "r");
            $json = NULL;

            if(filesize(file) > 0) {
                $fr = fread($handle, filesize(file));
                $json = json_decode($fr);
                fclose($handle);
            }
            
            $handle = fopen(file, "w");
            if($json == NULL){
                $id = 1;
                $data = array(array("id" => $id,
                                    "name" => $name,
                                    "email" => $email,
                                    "gender" => $gender,
                                    "dob" => $dob,
                                    "phone" => $phone,
                                    "username" => $username,
                                    "password" => $password));
                $data = json_encode($data);
            }
            else {
                $id = $json[count($json)-1]->id;
                $json[] = array("id" => $id + 1,
                                    "name" => $name,
                                    "email" => $email,
                                    "gender" => $gender,
                                    "dob" => $dob,
                                    "phone" => $phone,
                                    "username" => $username,
                                    "password" => $password);
                $data = json_encode($json);
            }
            fwrite($handle, $data);
            fclose($handle);
            setcookie('msg', '<b>✅ Registration Successful. <br>Please Wait for Approval</b>', time() + 1, '/');
         
            header("location: /labtask6/view/login.php");
        }

        else if ($isEmpty) {
            setcookie('msg', '<b>❌Required input missing</b><br>', time() + 1, '/');
            header("location: /labtask6/view/registration.php");
        }

        else {
            if($dobErr != NULL)
                setcookie('dob', $dobErr, time() + 1, '/');
            if($emailErr != NULL)
                setcookie('email', $emailErr, time() + 1, '/');
            if($usernameErr != NULL)
                setcookie('user', $usernameErr, time() + 1, '/');
            if($passwordErr != NULL)
                setcookie('pass', $passwordErr, time() + 1, '/');
            header("location: /labtask6/view/Registration.php");
        }
    }
?>