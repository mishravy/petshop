 <?php
  include("include/header.php");
 ?>
 
<div class="jumbotron">
    <?php if(!empty($_SESSION['eMsg'])){?>    
    <div class="alert alert-warning alert-dismissible errCl" id="errMsgP"role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong><?php echo $_SESSION['eMsg']; $_SESSION['eMsg']="";?>
    </div>
<?php } else if(!empty($_SESSION['sMsg'])) { ?>
    <div class="alert alert-sccess alert-dismissible errCl" id="errMsgP"role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong><?php  echo $_SESSION['sMsg']; $_SESSION['sMsg']="";?>
    </div>        
<?php }?>
<div class="alert alert-warning errCl" id="errMsg" style="display:none"/></div> 
<div class="container wh-bg">
    
    <!--Main Container-->

  <div class="col-sm-6 bdr-right">
      <form action="include/submitData.php" id="regForm" method="post" name="regForm" >
    <div class="container-index">       
        <div class="signup-box ">
          <div class="signup">Sign Up </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="First Name" name="firstNm" id="firstNm"/>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Last Name" name="lastNm" id="lastNm"/>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Email" name="emailId" id="emailId">
          </div>
        
          <div class="form-group">
            <div class="dob"><label>Birthday</label></div>
            <div class="clearfix"></div>
              
              <div class="row">
              <div class="col-sm-3">
            <select name="birthday_day" id="day" class="form-control">
              <option value="0" selected="1">Day</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
            </select>
                   </div>
                    <div class="col-sm-3">
            <select name="birthday_month" id="month" class="form-control">
              <option value="0" selected="1">Month</option>
              <option value="1">Jan</option>
              <option value="2">Feb</option>
              <option value="3">Mar</option>
              <option value="4">Apr</option>
              <option value="5">May</option>
              <option value="6">Jun</option>
              <option value="7">Jul</option>
              <option value="8">Aug</option>
              <option value="9">Sep</option>
              <option value="10">Oct</option>
              <option value="11">Nov</option>
              <option value="12">Dec</option>
            </select>
                 
              </div>
               <div class="col-sm-3">
            <select name="year" id="year" class="form-control">
              <option value="0" selected="1">Year</option>
              <?php $year= date('Y');
    		for($i=$year; $i >= 1950 ; $i--){?>
              <option value="<?php echo $i;?>"><?php echo $i;?></option>
              <?php }?>
            </select>
              </div>
          </div>
            </div>
            <div class="clearfix"></div>
          <div class="form-group">
            <div class="dob"><label>Gender</label></div>
            <div class="clearfix"></div>
            <label>
              <input type="radio" id="rbf" name="gender" value="m" checked="checked"/>
              Male</label>
            <label>
              <input type="radio" id="rbm" name="gender" value="f"/>
              Female</label>
          </div>
          <div class="clearfix"></div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="pwd" id="pwd"/>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Confirm Password" name="cpwd" id="cpwd">
          </div>
          <div class="form-group">
              <label>
            <input type="checkbox" id="chkbxTC" value="Y" name="chkbxTC" style="float:left;"/> <span class="m-l"> By clicking Sign Up, you agree to our <a href="#" onclick="return false">Terms</a> and that you have read our <a href="#" onclick="return false"> Policy.</a></span> </label></div>
          <div class="clear"></div>
          <div class="col-lg-8 form-group btn-sign">
            <input type="submit" class="btn btn-primary sub" value="Sign Up" name="signUp" id="signup" />
          </div>
        </div>
     
    </div>
    <!--row end-->
 
    
    </form>
     </div>
    <div class="col-sm-6 pd-l-r">
    <!--Login Form-->
<form action="include/submitData.php" method="post" id="loginFrm" name="loginFrm">
  <div class="login-box" id="loginDv" style="display:block">
    <div class="signin">Sign In</div>
    <div class="form-group ">
      <input type="text" class="form-control" name="loginId" id="loginId" placeholder="Username"/>
      
    </div>
    <div class="form-group box1">
      <input type="password" class="form-control" name="loginPwd" id="loginPwd" placeholder="Password"/>      
    </div>
      <div class="form-group box1">
      <label>
      <input type="checkbox"/>
      Keep me logged in</label>
      <label class="pull-right"> <a class="forgot" id="fp"> Forgot your password? </a></label>
      </div>
    <div class="form-group box2">
      <input type="submit" class="btn btn-primary sub" name="Login" value="Login" id="Login"/>
    </div>
  </div>
</form>
<!--Login Form ends-->
<!--Forget password Form-->
<form action="include/submitData.php"  method="post" id="forgetPwdFrm" name="forgetPwdFrm">
  <div class="login-box" id="Fpdiv" style="display:none;">
    <div class="signin">Please enter your email ID</div>
    <div class="form-group box1">
      <input type="text" class="form-control" placeholder="Email" name="FPemailId" id="FPemailId"/>
      </div>
    <div class="form-group box1">
      <input type="submit" class="btn btn-primary sub" value="Send" style="letter-spacing:normal" name="Send"/>
      <input type="button" class="btn btn-primary sub" value="Back" id="fpBack" style="letter-spacing:normal">
    </div>
  </div>
  Forget password Form End
  </form>
  </div>
  </div>

<!--header End-->
    
    </div>
    
</form>
<!--Main Container End-->
</div>

</div>
   
<!--- include footer-->
<?php
include("include/footer.php"); 
?>		
<script src="include/validation/JS-registration.php" language="javascript"></script>


<!--<script>
 $(document).ready(function(){
   setTimeout(function(){
  $(".errCl").fadeOut("slow");
}, 2000);
 });
</script>-->		
