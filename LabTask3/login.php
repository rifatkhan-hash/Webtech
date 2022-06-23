
<?php 

	$username=$password=$check="";
	$usernameErrMsg="";
	$passwordErrMsg="";
    $checkErr=" ";

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
	}		
 ?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
	
	<fieldset>
		<legend>LOG IN</legend>
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
		<br>
		<input type="checkbox" name="check" value="Remember Me<?php echo $check?>">Remember Me<br>
		<br>
	     <input type="submit" name="login" value="Login">
        
	     <a href="Forget.php">ForgetPassword?</a>

	</fieldset>
	

</form>
