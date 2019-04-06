<?php include('connection/connect.php');

if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['submit'] == 'Submit')
{
	$dob = $_POST['year']."-".$_POST['birthday_month']."-".$_POST['birthday_day'];
	$regDob = date('Y-m-d', strtotime($dob));
	$pwd = md5(trim($_POST['pwd']));
	$email = trim($_POST['comment']);
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
	else if (filter_var($_POST['comment'], FILTER_VALIDATE_EMAIL) === FALSE)
	{
        $_SESSION['eMsg'] = "comment is not valid";
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
	header('location:../feedback.php');
}

?>