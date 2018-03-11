<?php
    define('SITE_URL','http://localhost/ko/');
    if($_SESSION['name']){
        //echo "<script type='text/javascript'>alert('session!')</script>";
    }
    session_start();
    if($_REQUEST['logout']){
        session_destroy();
        header("Location:".SITE_URL);
    }
?>
<!--A Design by W3layouts 
   Author: W3layout
   Author URL: http://w3layouts.com
   License: Creative Commons Attribution 3.0 Unported
   License URL: http://creativecommons.org/licenses/by/3.0/
   -->
<!DOCTYPE html>
<!-- html -->
<html>
   <!-- head -->
   <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
      <!-- bootstrap-CSS -->
      <link rel="stylesheet" href="css/bootstrap-select.css">
      <link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
      <!-- Fontawesome-CSS -->
      <!-- jQuery (necessary for Bootstraps JavaScript plugins) -->
      <script type='text/javascript' src='js/jquery-2.2.3.min.js'></script>
      <script type='text/javascript' src='js/jquery.nivo.slider.js'></script>
      <!-- Custom Theme files -->
      <!--theme-style-->
      <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
      <link href="css/nivo-slider.css" rel="stylesheet" type="text/css" media="all" />
      <!--//theme-style-->
      <!--meta data-->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <!--//meta data-->
      <!-- online fonts -->
      <link href="//fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,vietnamese" rel="stylesheet">
      <link href="//fonts.googleapis.com/css?family=Oxygen:300,400,700&amp;subset=latin-ext" rel="stylesheet">
      <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
      <!-- /online fonts -->
      <script>
         $(document).ready(function(){
          $(".user_form").show();
           $(".register_form").hide();
           $(".Forget_Password").hide();
         });
         $(document).ready(function(){
             $("#User").click(function(){
                 $(".register_form").hide();
                 $(".user_form").show();
                   $(".Forget_Password").hide();
             });
             $("#Register").click(function(){
                 $(".user_form").hide();
                  $(".register_form").show();
           $(".Forget_Password").hide();
             });
             $(".psw").click(function(){
                 $(".user_form").hide();
                 $(".register_form").hide();
                 $(".Forget_Password").show();
                  
             });
         });
      </script>    
   </head>
   <style>
      .login_info{ width:100%; font-size: 12px; margin-top: 20px; flot:left; }
   </style>
   <!-- //head -->
   <!-- body -->
   <body >
      <!--header-->
      <header>
         <div class="container">
            <!--logo-->
            <div class="logo">
               <h1><a href="index.php">Korvi India</a></h1>
            </div>
            <!--//logo-->
            
			   <?php session_start(); if($_SESSION['token']){
				   ?>
				   <div class="w3layouts-login" style="color:yellow;">
				   <?php
						   echo "HI, ".$_SESSION['name']."
						   <a href='index.php?logout=true'><i class='glyphicon glyphicon-off'></i> Logout </a>  
						   </div>";
				}else{
				?>
				 <div class="w3layouts-login" data-target="#myModal" data-toggle="modal" style="color:yellow;">
				<a><i class="glyphicon glyphicon-user"> </i>Login/Sign Up </a>
				</div>
				<?php
			   }
			   
			   ?>
			   
            
            <div class="clearfix"></div>
         </div>
         <ul class="nav nav-list pull-left">
            <li>
               <a data-toggle="menu" href="#doc_menu" class="hidden-md hidden-lg" style="color:yellow;text-indent:0 !important;">
               <span class="icon icon-lg">menu</span>
               </a>
            </li>
         </ul>
      </header>
      <!--//-->	
      <div class=" header-right">
         <div class="slider-wrapper theme-default">
            <div id="slider1" class="nivoSlider">
               <img src="images/2.jpg" />
               <img src="images/1.jpg" />
            </div>
         </div>
      </div>
      <div class="modal fade" id="myModal" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" >
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <span class="avatar avatar-inline avatar-lg">
                  <img alt="Login"  class="img-responsive" src="https://image.freepik.com/free-icon/male-user-silhouette_318-35708.jpg">
                  </span>
                  Login/Sign UP
               </div>
               <div class="modal-body">
                  <button id="User" style="background-color:#28ece3; color:#337ab7;border: none;">Login</button>&nbsp; 
                  <button id="Register" style="background-color:#28ece3; color:#337ab7;border: none;">Register</button>
                  <div class=row container>
                     <div class="col-sm-12">
                        <form method="post" class="user_form">
                           <div class="col-sm-12">
                              <div class="col-sm-6">
                                 <input type="text" placeholder="Email Id/Mobile Number" id="username" name="username" value="" class="form-control login_info" >
                              </div>
                           </div>
                           <div class="col-sm-12">
                              <div class="col-sm-6">
                                 <input type="password" placeholder="Password" id="password" name="password" value="" class="form-control login_info" >
                              </div>
                           </div>
                           <div class="col-sm-12">
                              <div class="col-sm-6">
                                 <label>
                                 <input type="checkbox" checked="checked" style="margin-bottom:15px"> Remember me
                                 </label>
                              </div>
                              <div class="col-sm-6" data-target="#forget_password" data-toggle="modal">
                                 <span class="psw">Forgot <a>password?</a></span>
                              </div>
                           </div>
                           <div class="col-sm-12" align="center">
                              <button class="login_btn" name="login_mail"  style="background-color:#404a59; color:yellow;border: none; margin-top:20px;" >Login</button>
                           </div>
                        </form>
                     </div>
                  </div>
                  <div class="row container">
                     <div class="col-sm-12">
                        <form method="POST" action="#" class="register_form">
                           <div class="col-sm-12">
                              <div class="col-sm-6">
                                 <input type="text" placeholder="First Name" id="firstname" name="firstname" value="" class="form-control login_info" >
                              </div>
                           </div>
                           <div class="col-sm-12">
                              <div class="col-sm-6">
                                 <input type="text" placeholder="Last Name" id="lastname" name="lastname" value="" class="form-control login_info" >
                              </div>
                           </div>
                           <div class="col-sm-12">
                              <div class="col-sm-6">
                                 <input type="email" placeholder="Email Id" id="email" name="email" value="" class="form-control login_info" >
                              </div>
                           </div>
                           <div class="col-sm-12">
                              <div class="col-sm-6">
                                 <input type="text" placeholder="Mobile Number" id="mobile" name="mobile" value="" class="form-control login_info"  >
                              </div>
                           </div>
                           <div class="col-sm-12">
                              <div class="col-sm-6">
                                 <input type="password" placeholder="Password" id="password" name="password" value="" class="form-control login_info" >
                              </div>
                           </div>
                           <div class="col-sm-12" align="center">
                              <button class="login_btn" name="submit_mail" style="background-color:#404a59; color:yellow;border: none;margin-top:20px;" >SIGNUP</button>
                           </div>
                        </form>
                     </div>
                  </div>
                  <div class=row container>
                     <div class="col-sm-12">
                        <form method="post" action="#" class="Forget_Password">
                           <div class="col-sm-12">
                              <div class="col-sm-6">
                                 <h3 style="color:red;">Forgot Password</h3>
                              </div>
                           </div>
                           <div class="col-sm-12">
                              <div class="col-sm-6">
                                 <input type="text" placeholder="Enter Email" id="username" name="username" value="" class="form-control login_info" >
                              </div>
                           </div>
                           <div class="col-sm-12" align="center">
                              <button class="login_btn" name="password_submit"  style="background-color:#404a59; color:yellow;border: none;margin-top:20px;">SUBMIT</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
               </div>
            </div>
         </div>
      </div>
      <?php
         include("config.php");
         session_start();
         if(isset($_POST['submit_mail']))
         {
            $firstname  =$_POST['firstname'];
            $lastname   =$_POST['lastname'];
            $email      =$_POST['email'];
            $mobile     =$_POST['mobile'];
            $password   =md5($_POST['password']);
            $sql="insert into users(first_name,last_name,email,mobile,password) values ('$firstname','$lastname','$email','$mobile','$password')";
            //echo "insert into user_login (user_email,user_password,user_name,user_mobile) values ('$u_email1','$u_psw','$u_name1','$u_mobile1')";
            $isDataInseted = mysql_query($sql);
            if($isDataInseted)
            {	
                $_SESSION['token'] = $email.':'.$password;
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $firstname;
                //send email start
                $to = $email;
                $subject = "KorviIndia";
                $txt= "Welcome to KorviIndia.";
                $headers .= "From: Korviindia@example.com" . "\r\n" .
                "CC: somebodyelse@example.com";
                mail($to,$subject,$txt,$headers);
                //send email ednign
                echo "<script type='text/javascript'>alert('SignUp Successfully!')</script>";
                header("Location:".SITE_URL."/mobile.php");
            }else{
                echo "<script type='text/javascript'>alert('SignUp unsuccessfully!')</script>";
            }
        }
         
         
         if(isset($_POST['login_mail']))
         {
            $username=$_POST['username'];
            $password=md5($_POST['password']);
            
            $query="select * from `users` WHERE email='$username' AND password='$password'";
            // echo $query;
            $result = mysql_query ($query);
            $isData = mysql_fetch_array($result);
        //print_r($isData); exit;
		 	if (count($isData))
         	 {
				
				session_start();
				$_SESSION['token'] = $isData['email'].':'.$password;
				$_SESSION['email'] = $isData['email'];
                $_SESSION['name'] =  $isData['first_name'];
                
				echo "<script type='text/javascript'>alert('Login Successfully!');  window.location.href = 'mobile.php';</script>";
                //header("Location:".SITE_URL."/dth.php");
            }else{ 
				echo "<script type='text/javascript'>alert('Sorry, this login is invalid!')</script>";
             }
        }	
     ?>
      <?php 
         if(isset($_POST['password_submit'])){
         $username=$_POST['username'];
         $query="select count(*) as count from `users` WHERE email='$username'";
         $result = mysql_query ($query);
         $isData = mysql_fetch_array($result);
              if ($isData['count'])
               {
                    $to = $username ;
                    $subject = "KorviIndia";
                    $password = rand(999, 99999);
                    $password_hash = md5($password);
                    $qry_update="UPDATE `users`  SET password='$password_hash' WHERE email='$username'";
                    $up1 = mysql_query($qry_update);
                    $txt= "YOUR new password is:".$password;
                    $headers .= "From: webmaster@example.com" . "\r\n" .
                    "CC: somebodyelse@example.com";
                    mail($to,$subject,$txt,$headers);
                 echo "<script type='text/javascript'>alert('Password will be send to your register email address!');</script>";
               }else{ 
                 echo "<script type='text/javascript'>alert('Sorry, this email is invalid!')</script>";
              }

              


         
        }
         
         
         ?>