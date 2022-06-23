<!DOCTYPE HTML>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $dayErr = $monthErr = $yearErr= $genderErr =  "";
$name = $email = $day = $month = $year = $gender ="";
$username=$password=$confirmpassword="";
$usernameErrMsg="";
$passwordErrMsg="";
$confirmpasswordErrMsg="";
$message = '';  
$error = '';


 if(isset($_POST["submit"]))  
{ 
#Name Validation
  if (empty($_POST["name"])) 
  {
    $nameErr = "Name is required";
  } 
  else 
  {
    $name = $_POST["name"];
    // check if name only contains letters and period & dash
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) 
    {
      $nameErr = "Only letters and dash allowed";
    }
    else if (str_word_count($_POST["name"])<2) 
    {
        $nameErr = "Name must contain at least 2 words";
    }
  }

#Email Validation
  if (empty($_POST["email"])) 
  {
    $emailErr = "Email is required";
  } 
  else 
  {
    $email = $_POST["email"];
    // check if e-mail address is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
      $emailErr = "Invalid email format";
    }
  }
  #USerName Validation
  if ($_SERVER['REQUEST_METHOD'] === "POST") {
		
		if (empty($_POST["username"])) 
  {
    $usernameErr = "username is required";
  } 
  else
  {
    $username = $_POST["username"];
   
    if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) 
    {
      $nameErr = "Only letters and dash allowed";
    }
    else if (str_word_count($_POST["username"])<2) 
    {
        $usernameErr = "Username must contain at least 2 words";
    }
  }
  }  
#Password validation
if(!empty($_POST["password"]))
	{
			
       if (strlen($_POST["password"]) <= '8') 
	    {
            $passwordErr = "Your Password Must Contain At Least 8 Characters!";
        }
       elseif(!preg_match("#[0-9]+#",$password))
	    {
            $passwordErr = "Your Password Must Contain At Least 1 Number!";
        }
       elseif(!preg_match("#[A-Z]+#",$password)) 
	    {
          $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
        }
       elseif(!preg_match("#[a-z]+#",$password))
	    {
            $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
        }
    }
if (empty($_POST["confirmpassword"])) 
  {
    $confirmpasswordErrMsg = "confirmpassword is required";
  } 
  if ($password==$confirmpassword) 
  {
    echo "password matched!";
  } 
  else
  {
	  echo "Not matched!";
  }

#Date of birth Validation

#Day validation
  if (empty($_POST["day"])) 
  {
    $dayErr = "Day is required";
  } 
  else 
  {
    $day = $_POST["day"];
    if($day>31 || $day<0)
    {
        $dayErr = "Invalid Day";
    }
  }

#Month Validation
  if (empty($_POST["month"])) 
  {
    $monthErr = "Month is required";
  } 
  else 
  {
    $month = $_POST["month"];
    if($month>12 || $month<0)
    {
        $dayErr = "Invalid Month";
    }
  }

#Year Validation
  if (empty($_POST["year"])) 
  {
    $yearErr = "Year is required";
  } 
  else 
  {
    $year = $_POST["year"];
    if($year>1998 || $year<1953)
    {
        $dayErr = "Invalid Year";
    }
  }

#Gender Validation
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else 
  {
    $gender = $_POST["gender"];
  }
  
  
        if(file_exists('data.json'))  
           {  
                $current_data = file_get_contents('data.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                     'name'     =>     $_POST['name'],  
                     'email'    =>     $_POST["email"],  
                     #'username' =>     $_POST["username"],
					 'password' =>     $_POST["password"],
                     'gender'   =>     $_POST["gender"],  
                     'dob'      =>     $_POST["dob"]  
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('data.json',$final_data))  
                {  
                     $message = "<label class='text-success'>File Appended Success fully</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  


}

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

<fieldset>
  Name:
  <br> 
  <input type="text" name="name" value="<?php echo $name;?>">
  <span style="color: red">* <?php echo $nameErr;?></span>
  <br>
  E-mail: 
  <br>
  <input type="text" name="email" value="<?php echo $email;?>">
  <span style="color: red">* <?php echo $emailErr;?></span>
  <br>
  User Name :
		<input type="text" name="uname" id="uname">
		<span style="color: red">*
		<?php
			echo $usernameErrMsg;
		?>
		</span>
		<br>
		Password :
		<input type="text" name="password" id="password">
		<span style="color: red">*
		
		<?php
			echo $passwordErrMsg;
		?>
		</span>
		<br>
		Confirm Password :
		<input type="text" name="confirmpassword" id="confirmpassword">
		<span style="color: red">*
		
		<?php
			echo $confirmpasswordErrMsg;
		?>
		</span> 
		<br>
  <fieldset>
  <legend>Gender</legend>
    <input type="radio" id="male" name="gender" value="male">
    <label for="male">Male</label>                     
    <input type="radio" id="female" name="gender" value="female">
    <label for="female">Female</label>
    <input type="radio" id="other" name="gender" value="other">
    <label for="other">Other</label><br>
</fieldset>
<fieldset>
  <legend>Date of Birth:</legend>
   <input type="date" name="dob"> <br><br>
</fieldset> 
  <input type="submit" name="submit" value="submit">                      
                     <?php  
                     if(isset($message))  
                     {  
                          echo $message;  
                     }  
                     ?>   
 <input type="reset" >
</fieldset>  
</form>