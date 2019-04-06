<?php
include("connection/connect.php");
 if(!empty($_SESSION['RG_email']) && !empty($_SESSION['RG_password'])){
$QUERY ="SELECT * FROM sn_registration WHERE RG_id = '".$_SESSION['RG_id']."'";
	$RS = $SocialRootCl->fnQueryWithoutWhere($QUERY);
	$FETCH = $RS->fetch(PDO::FETCH_OBJ);
 }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Pet Maintenance</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    <!--Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Duru+Sans|Actor' rel='stylesheet' type='text/css'>
    <!--Bootshape-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- style css -->
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>

    <!-- Navigation bar -->
    <div class="navbar dwn-shd navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><span class="green">Pet</span> Maintenance</a>
        </div>
        <nav role="navigation" class="collapse navbar-collapse navbar-right">
                    <ul class="navbar-nav nav">
            <li class="nots" ><a href="index.php">Home</a></li>

                        <li class="nots"><a href="adoption.php">Why Adopt Pet ??</a></li>
                        <li class="nots"><a href="aboutus.php">About Us</a></li>
            <?php
             if(empty($_SESSION['RG_email']) && empty($_SESSION['RG_password'])){
				echo ' <li class="nots"><a  href="registration.php">Sign up | Login </a></li> ';
			}else{ ?>
				<li class="nots user""><li><a href="feedback.php">feedback</a></li>
				<li class="nots"><a  href="#">Special Offers</a></li>
				<a><li class="nots">Welcome  <span>
					<?php echo ucwords($FETCH->RG_firstname)." ".ucwords($FETCH->RG_lastname);?>
							</span></a></li>
               <li><a href="logout.php" class="nots">Logout</a></li>

	<?php	} ?>

          </ul>
		  </nav>
      </div>
    </div><!-- End Navigation bar -->
