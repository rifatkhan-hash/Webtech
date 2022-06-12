<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $dayErr = $monthErr = $yearErr= $genderErr = $degreeErr = $bloodErr = "";
$name = $email = $day = $month = $year = $gender = $degree = $blood = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
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

# Degree Verification
  if(empty($_POST["degree"])) 
  {
    $degreeErr = "Degree is required";
  }
  else
  {
    $degree = $_POST["degree"];
  }

#Blood Verification
  if (empty($_POST["blood"])) 
  {
    $bloodErr = "Blood Group is required";
  }
  else
  {
    $blood = $_POST["blood"];
  }
}

?>

<h2>PHP Form Validation</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name:
  <br> 
  <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br>
  E-mail: 
  <br>
  <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br>
  Date of Birth:
  <table>
	    	<tr>
	    		<td align="center">dd</td>
	    		<td align="center">mm</td>
	    		<td align="center">yyyy</td>
	    	</tr>
	    	
	    	<tr>
	    		<td>
	    			<input type="number" id="day" name="day" value="<?php echo $day;?>"><span class="error">*<?php echo $dayErr ?></span> 
                    <?php echo "/" ?>
	    		</td>
	    		
	    		<td>
	    			<input type="number" id="month" name="month" value="<?php echo $month;?>"><span class="error">*<?php echo $monthErr ?></span>
                    <?php echo "/" ?>
	    		</td>
	    		
	    		<td>
	    			<input type="number" id="year" name="year" value="<?php echo $year;?>"><span class="error">*<?php echo $yearErr ?></span>
	    		</td>
	    	</tr>
	    	
	    </table>
        <br>
  Gender:
  <br>
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Male") echo "checked";?> value="Male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Female") echo "checked";?> value="Female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Other") echo "checked";?> value="Other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br>
  Degree:
  <br>
  <input type="checkbox" name="degree" value="SSC"> SSC
  <input type="checkbox" name="degree" value="HSC"> HSC
  <input type="checkbox" name="degree" value="BSc"> BSc
  <input type="checkbox" name="degree" value="MSc"> MSc <span class="error">*<?php echo $degreeErr ?></span>
  <br>

  Blood Group:
  <br>
  <select name="blood" id="blood">
		<option value="<?php echo $blood;?>"><span class="error"><?php echo $bloodErr ?></span></option>
		<option value="AB+">AB+</option>
		<option value="AB-">AB-</option>
		<option value="A+">A+</option>
		<option value="A-">A-</option>
		<option value="B+">B+</option>
		<option value="B-">B-</option>
		<option value="O+">O+</option>
		<option value="O-">O-</option>
	</select><br>

  <br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $day;
echo "/" ;
echo $month;
echo "/" ;
echo $year;
echo "<br>";
echo $gender;
echo "<br>";
echo $degree;
echo "<br>";
echo $blood;
?>

</body>
</html>