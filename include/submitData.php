<?php include('connection/connect.php');

if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['signUp'] == 'Sign Up')
{
	$dob = $_POST['year']."-".$_POST['birthday_month']."-".$_POST['birthday_day'];
	$regDob = date('Y-m-d', strtotime($dob));
	$pwd = md5(trim($_POST['pwd']));
	$email = trim($_POST['emailId']);
    $regDate = date("Y-m-d : H:i:s", time());
	
	if($_POST['firstNm']=="")
	{
		$_SESSION['eMsg'] = "First name is required";
	}
	else if($_POST['lastNm']=="")
	{
		$_SESSION['eMsg'] = "Last name is required";
	}
	else if($_POST['emailId']=="")
	{
		$_SESSION['eMsg'] = "Email Id is required";
	}
	else if (filter_var($_POST['emailId'], FILTER_VALIDATE_EMAIL) === FALSE)
	{
        $_SESSION['eMsg'] = "Email ID is not valid"; 
    }
	else if($_POST['pwd']=="")
	{
		$_SESSION['eMsg'] = "Password is required";
	}
	else if($_POST['cpwd']=="")
	{
		$_SESSION['eMsg'] = "Confirm password is required";
	}
	else if($_POST['birthday_day']=="0")
	{
		$_SESSION['eMsg'] = "Birth date is required";
	}
	else if($_POST['birthday_month']=="0")
	{
		$_SESSION['eMsg'] = "Birth month is required";
	}
	else if($_POST['year']=="0")
	{
		$_SESSION['eMsg'] = "Birth year is required";
	}
	else if (!isset($_POST['chkbxTC']))
	{
        $_SESSION['eMsg'] = 'Please agree to Terms and Conditions';
	} 
	else
	{
		$ARRAY = array(trim($_POST['firstNm']), trim($_POST['lastNm']),$email,$pwd,$regDob,$_POST['gender'],$_POST['chkbxTC']);
		$QUERY = "INSERT INTO `sn_registration`(`RG_firstname`, `RG_lastname`, `RG_email`, `RG_password`, `RG_dob`, `RG_gender`,`RG_tnc`, `RG_mem_status`,`RG_regDate`, `RG_status`) VALUES (?, ?, ?, ?, ?, ?, ?, 1,'".$regDate."', 0)";
		$rs = $SocialRootCl->fnQueryWithWhere($QUERY, $ARRAY);
		if($rs == 1)
		{
			$query1 = "SELECT LAST_INSERT_ID() as id";
			$rs = $SocialRootCl->fnQueryWithoutWhere($query1);
			$res = $rs->fetch(PDO::FETCH_OBJ);
			$lrd = $res->id;
			//echo $lrd;
			mkdir("postImgs/".$lrd."_posts");
			$subject = "Congratulations for successful registration";
			$message = "Congratulations for successful registration <br><br> Your Login Id:".$email."<br>Password:".trim($_POST['pwd']);					
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";					
			$headers .= "To: ".$email."" . "\r\n";
			@mail($email, $subject, $message, $headers);
			$_SESSION['sMsg']="Registered Successfully";
		}else
		{
			$_SESSION['eMsg']="Registration Failed";
		}
	}
	header('location:../registration.php');
}

/** login form **/

if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Login'] == 'Login')
{
	$pwd = md5(trim($_POST['loginPwd']));
	$ARRAY = array(trim($_POST['loginId']),1);
	$QUERY = "SELECT * FROM `sn_registration` WHERE `RG_email` = ? AND `RG_mem_status` = ?";
	$rs = $SocialRootCl->fnQueryWithWhere($QUERY, $ARRAY);
	$res = $rs->fetch(PDO::FETCH_OBJ);
	$rows = $rs->rowCount();
	if($_POST['loginId']=="")
	{
		$_SESSION['eMsg'] = "Please enter login Id";
		header('location:../registration.php');
	}
	else if($_POST['loginPwd']=="")
	{
		$_SESSION['eMsg'] = "Please enetr password";
		header('location:../registration.php');
	}
	else if($res->RG_email != $_POST['loginId'])
	{
		$_SESSION['eMsg'] = "Incorrect Login ID";
		header('location:../registration.php');
	}
	else if($res->RG_password != $pwd)
	{
		$_SESSION['eMsg'] = "Incorrect Password";
		header('location:../registration.php');
	}
	else if($rows == 1)
	{
		 $_SESSION['RG_email'] = $res->RG_email;
		 $_SESSION['RG_password'] = $res->RG_password;
		 $_SESSION['RG_id'] = $res->RG_id;
		 if(!empty($res->RG_city)){
		  header('location:../index.php');
		 }else{
		   header('location:../index.php');
		}
	}
	else
	{
		$_SESSION['eMsg'] = "Login credentials are not valid";
		header('location:../registration.php');
	}
}


/** forget password **/
if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['Send'] == 'Send')
{
 $emailId = trim($_POST['FPemailId']);
 $USERpwd = $SocialRootCl->random_string();
 $savePwd = md5($USERpwd);
 
 $ARRAY1 = array(trim($_POST['FPemailId']),1);
 $QUERY1 = "SELECT * FROM `sn_registration` WHERE `RG_email` = ? AND `RG_mem_status` = ?";
 $rs1 = $SocialRootCl->fnQueryWithWhere($QUERY1, $ARRAY1);
 $res1 = $rs1->fetch(PDO::FETCH_OBJ);
 $rows = $rs1->rowCount();
 if($rows == 1)
    {
      $ARRAY = array($savePwd,$emailId);
      $QUERY = "UPDATE `sn_registration` SET `RG_password` = ?  WHERE `RG_email` = ?";
      $rs = $SocialRootCl->fnQueryWithWhere($QUERY, $ARRAY);
    if($rs == 1)
        {
           $subject = "Your new password";
           $message = "Here is your password:".$USERpwd;     
           $headers  = 'MIME-Version: 1.0' . "\r\n";
           $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";     
           $headers .= "To: ".$emailId."" . "\r\n";
           @mail($emailId, $subject, $message, $headers);
           $_SESSION['sMsg'] = "New password has been sent to your email id";
          }
    else
          {
           $_SESSION['eMsg'] = "Failed to update your password";
          }
     }
 else
     {
      $_SESSION['eMsg'] = "Incorrect login Id";
      
     }
   header('location:../registration.php');
    }
?>