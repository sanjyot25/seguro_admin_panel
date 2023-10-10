<?php
session_start();
include_once 'database_connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);
// echo "<script>alert('inside')</script>";


$user_name_cookie = "username_cookie";
if(isset($_COOKIE[$user_name_cookie]) != '')
{
    echo $user_name_cookie;
  header("Location: view_registered_vendors.php");
}

// echo $_SESSION['search'];


if(isset($_POST['username']))
{
    // echo "<script>alert('verifying pass')</script>";
    if(empty($_POST["username"]) || empty($_POST["password"])){

        // $message = "<div class='alert-danger'>enter username and password</div>"
        echo "not set";

    }
    else
    {
        // echo "<script>alert('verifying pass and user')</script>";
      $user = $_POST['username'];
      $password = $_POST['password'];
      $res = $conn->prepare("SELECT * FROM admin_login WHERE admin_username = ?");
      $res->bind_param('s', $user);
      $res->execute();
      $result = $res->get_result();
      $row = $result->fetch_assoc();
      if(password_verify($password, $row['admin_password']))
      {

        // echo "<script>alert('insied password verify')</script>";
    		$user_name_cookie_value = $row['admin_username'];
    		setcookie($user_name_cookie, $user_name_cookie_value, time() + (10 * 365 * 24 * 60 * 60), '/');
             // cookie expires in 10 years
            echo $_COOKIE[$user_name_cookie];
             header("Location: view_registered_vendors.php");
            
      }
      else
      {
    //    $message = "<div class='alert-danger'>wrong username</div>" 
            // echo "else loop";
      }
    }
  }


  




// forgot password
// *****************************************************************
if(isset($_POST["email"]) && (!empty($_POST["email"])))
{
    echo '<script>alert("Welcome to Geeks for Geeks")</script>';
}

if(isset($_POST["email"]) && (!empty($_POST["email"])))
{
  $email = $_POST["email"];
  $error = '';
  if (!$email)
  {
    $error .="Invalid email address please type a valid email address!";
  }
  else
  {
    $check_user = $conn->prepare('SELECT * FROM admin_login WHERE registered_email = ?');
    $check_user->bind_param('s', $email);
    $check_user->execute();
    $check_user_res = $check_user->get_result();

    $check_user_res_row = $check_user_res->fetch_assoc();
    $admin_username_to_reset = $check_user_res_row['admin_username'];

    echo "<script>alert('$admin_username_to_reset')</script>";
    
    echo "<script>alert('$email')</script>";

    if ($check_user_res->num_rows == '0')
    {
      $error .= "No Vendor is registered with this email address";
    }
  }

  if($error!="")
  {
  ?><script>alert('<?php echo $error; ?>');window.history.back();</script><?php
  }
  else
  {

    echo "<script>alert('$email')</script>";

    echo '<script>alert("inside create key for email")</script>';
    $expFormat = mktime(date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y"));
    $expDate = date("Y-m-d H:i:s",$expFormat);
    // $key = md5(2418*2+$email);
    $key = md5($email);
    $addKey = substr(md5(uniqid(rand(),1)),3,10);
    $key = $key . $addKey;
    echo "<script>alert('$key')</script>";
    $insert_reset = $conn->prepare('INSERT INTO admin_password_reset_temp(admin_username, email, key_id, expdate) VALUES (?,?,?,?)');
    $insert_reset->bind_param('ssss', $admin_username_to_reset, $email, $key, $expDate);
    $insert_reset->execute();

   
    $output.='<p>Dear user,</p>';
    $output.='<p>Welcome to <Trade Name>. We’re thrilled to see you here! .</p>';
    $output.='<p>-------------------------------------------------------------</p>';
    $output.='<p><a href="http://localhost/seguro.com/reset_pass.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">
    http://localhost/seguro.com/reset_pass.php?key='.$key.'&email='.$email.'&action=reset</a></p>';
    $output.='<p>-------------------------------------------------------------</p>';
    $output.='<p>Please be sure to copy the entire link into your browser.
    The link will expire after 1 day for security reason.</p>';
    $output.='<p>If you did not request this forgotten password email, no action
    is needed, your password will not be reset. However, you may want to log into
    your account and change your security password as someone may have guessed it.</p>';
    $output.='<p>Thanks,</p>';
    $output.='<p>Seguro Team</p>';
    $body = $output;
    $subject = "Seguro Password Recovery - seguro.in";

    // $message = $output;

    echo '<script>alert("phpmailer set")</script>';

    try
    {    echo '<script>alert('.$email.')</script>';
        echo '<script>alert("inside try")</script>';
       
      //Recipients
        
      $mail->isSMTP();											
      $mail->Host	 = 'smtp.gmail.com;';					
      $mail->SMTPAuth = true;							
      $mail->Username = 'sanjyotvelip25@gmail.com';				
      $mail->Password = 'qeefwzuhfxkrmumf';						
      $mail->SMTPSecure = 'tls';							
      $mail->Port	 = 587;  
      $mail->setFrom('sanjyotvelip25@gmail.com', 'seguro password recovery');
      $mail->addAddress($email);		
     
    //   $2y$10$vqJzMSVhJ6Qq7XwKI7.rCezPxQKv5b0vI895zyiT6ApcMQRY/zCk2
   
      // Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = $subject;
      $mail->Body    = $body;
      $mail->AltBody = $body;
      echo '<script>alert( "after inside try")</script>';
   
        
      if($mail->send())
      {
        echo "<script>alert('mail sent')</script>";
      }
      else{
        echo "<script>alert('$mail->ErrorInfo')</script>";
      }



   
      
      echo '<script>alert("mail after send")</script>';
      ?><script>alert('An email has been sent to you with instructions on how to reset your password.');window.location.href="login.php";</script><?php
    }
    catch (Exception $e)
    {
      ?><script>alert('uncaught error');window.history.back();</script><?php
    }
  }
}

// *****************************************************************
// forgot password end
// *****************************************************************
?>
<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 9 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in 
sss order to legally use the theme for your project.
-->


<html lang="en" >
    <!--begin::Head-->
    <head><base href="dist/">
                <meta charset="utf-8"/>
        <title>Seguro admin</title>
        <meta name="description" content="Login page example"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>        <!--end::Fonts-->


                    <!--begin::Page Custom Styles(used by this page)-->
                             <link href="assets/css/pages/login/classic/login-1.css" rel="stylesheet" type="text/css"/>
                        <!--end::Page Custom Styles-->

        <!--begin::Global Theme Styles(used by all pages)-->
                    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
                    <link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css"/>
                    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css"/>
                <!--end::Global Theme Styles-->

        <!--begin::Layout Themes(used by all pages)-->

<link href="assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css"/>        <!--end::Layout Themes-->

        <link rel="shortcut icon" href="assets/media/logos/seguro_favicon.ico"/>

            </head>
    <!--end::Head-->

    <!--begin::Body-->
    <body  id="kt_body"  class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading"  >

    	<!--begin::Main-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Login-->
<div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
    <!--begin::Aside-->
    <div class="login-aside d-flex flex-row-auto bgi-size-cover bgi-no-repeat p-10 p-lg-10" style="background-image: url(assets/media/bg/bg-12.jpg);">
        <!--begin: Aside Container-->
        <div class="d-flex flex-row-fluid flex-column justify-content-between">
            <!--begin: Aside header-->
            <a href="#" class="flex-column-auto mt-5 pb-lg-0 pb-10">
				<img src="assets/media/logos/login_logo.png" class="max-h-100px" alt=""/>
			</a>
            <!--end: Aside header-->

            <!--begin: Aside content-->
            <div class="flex-column-fluid d-flex flex-column justify-content-center">
                <h3 class="font-size-h1 mb-5 text-black">Welcome to SEGURO! Admin Dashboard</h3>
                <p class="font-weight-lighter text-black opacity-80">

            </p>
            </div>
            <!--end: Aside content-->

            <!--begin: Aside footer for desktop-->
            <div class="d-none flex-column-auto d-lg-flex justify-content-between mt-10">
                <div class="opacity-70 font-weight-bold	text-black">
                    &copy; 2022 Seguro
                </div>
                <div class="d-flex">
                    <a href="#" class="text-black" style={text-decoration:none;}>Privacy</a>
                    <a href="#" class="text-black ml-10">Legal</a>
                    <a href="#" class="text-black ml-10">Contact</a>
                </div>
            </div>
            <!--end: Aside footer for desktop-->
        </div>
        <!--end: Aside Container-->
    </div>
    <!--begin::Aside-->

    <!--begin::Content-->
    <div class="d-flex flex-column flex-row-fluid position-relative p-7 overflow-hidden">
        <!--begin::Content header-->
        <!-- <div class="position-absolute top-0 right-0 text-right mt-5 mb-15 mb-lg-0 flex-column-auto justify-content-center py-5 px-10">
            <span class="font-weight-bold text-dark-50">Dont have an account yet?</span>
            <a href="javascript:;" class="font-weight-bold ml-2" id="kt_login_signup">Sign Up!</a>
        </div> -->
        <!--end::Content header-->

        <!--begin::Content body-->
        <div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">
            <!--begin::Signin-->
            <div class="login-form login-signin">
                <div class="text-center mb-10 mb-lg-20">
                    <h3 class="font-size-h1">Sign In</h3>
                    <p class="text-muted font-weight-bold">Enter your username and password</p>
                </div>

                <!--begin::Form-->
                <form method="post" class="form" novalidate="novalidate" id="kt_login_signin_form">
                    <div class="form-group">
                        <input class="form-control form-control-solid h-auto py-5 px-6" type="text" placeholder="Username" name="username" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-solid h-auto py-5 px-6" type="password" placeholder="Password" name="password" autocomplete="off"/>
                    </div>
                    <!--begin::Action-->
                    <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                        <a href="javascript:;" class="text-dark-50 text-hover-primary my-3 mr-2" id="kt_login_forgot">
    						Forgot Password ?
    					</a>
                        <button name="login" type="button" id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3">Sign In</button>
                    </div>
                    <!--end::Action-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Signin-->

            <!--begin::Signup-->
            <div class="login-form login-signup">
                <div class="text-center mb-10 mb-lg-20">
                    <h3 class="font-size-h1">Sign Up</h3>
                    <p class="text-muted font-weight-bold">Enter your details to create your account</p>
                </div>

                <!--begin::Form-->


                
                <form class="form" novalidate="novalidate" id="kt_login_signup_form">
                    <div class="form-group">
                        <input class="form-control form-control-solid h-auto py-5 px-6" type="text" placeholder="Fullname" name="fullname" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-solid h-auto py-5 px-6" type="email" placeholder="Email" name="email" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-solid h-auto py-5 px-6" type="password" placeholder="Password" name="password" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-solid h-auto py-5 px-6" type="password" placeholder="Confirm password" name="cpassword" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <label class="checkbox mb-0">
                            <input type="checkbox" name="agree"/>
                            <span></span>
                            I Agree the <a href="#">terms and conditions</a>
                        </label>
                    </div>
                    <div class="form-group d-flex flex-wrap flex-center">
                        <button type="button" id="kt_login_signup_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Submit</button>
                        <button type="button" id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-4">Cancel</button>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Signup-->

            <!--begin::Forgot-->
            <div class="login-form login-forgot">
                <div class="text-center mb-10 mb-lg-20">
                    <h3 class="font-size-h1">Forgotten Password ?</h3>
                    <p class="text-muted font-weight-bold">Enter your email to reset your password</p>
                </div>

                <!--begin::Form-->
                <form method="post" class="form" novalidate="novalidate" id="kt_login_forgot_form">
                    <div class="form-group">
                        <input class="form-control form-control-solid h-auto py-5 px-6" type="email" placeholder="Email" name="email" autocomplete="off"/>
                    </div>
                    <div class="form-group d-flex flex-wrap flex-center">
                        <button type="submit" id="kt_login_forgot_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Submit</button>
                        <button type="button" id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-4">Cancel</button>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Forgot-->
        </div>
        <!--end::Content body-->

		<!--begin::Content footer for mobile-->
		<div class="d-flex d-lg-none flex-column-auto flex-column flex-sm-row justify-content-between align-items-center mt-5 p-5">
			<div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">
				&copy; 2020 Metronic
			</div>
			<div class="d-flex order-1 order-sm-2 my-2">
				<a href="#" class="text-dark-75 text-hover-primary">Privacy</a>
				<a href="#" class="text-dark-75 text-hover-primary ml-4">Legal</a>
				<a href="#" class="text-dark-75 text-hover-primary ml-4">Contact</a>
			</div>
		</div>
		<!--end::Content footer for mobile-->
    </div>
    <!--end::Content-->
</div>
<!--end::Login-->
	</div>
<!--end::Main-->


        <script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
        <!--begin::Global Config(global config for global JS scripts)-->
        <script>
            var KTAppSettings = {
    "breakpoints": {
        "sm": 576,
        "md": 768,
        "lg": 992,
        "xl": 1200,
        "xxl": 1400
    },
    "colors": {
        "theme": {
            "base": {
                "white": "#ffffff",
                "primary": "#3699FF",
                "secondary": "#E5EAEE",
                "success": "#1BC5BD",
                "info": "#8950FC",
                "warning": "#FFA800",
                "danger": "#F64E60",
                "light": "#E4E6EF",
                "dark": "#181C32"
            },
            "light": {
                "white": "#ffffff",
                "primary": "#E1F0FF",
                "secondary": "#EBEDF3",
                "success": "#C9F7F5",
                "info": "#EEE5FF",
                "warning": "#FFF4DE",
                "danger": "#FFE2E5",
                "light": "#F3F6F9",
                "dark": "#D6D6E0"
            },
            "inverse": {
                "white": "#ffffff",
                "primary": "#ffffff",
                "secondary": "#3F4254",
                "success": "#ffffff",
                "info": "#ffffff",
                "warning": "#ffffff",
                "danger": "#ffffff",
                "light": "#464E5F",
                "dark": "#ffffff"
            }
        },
        "gray": {
            "gray-100": "#F3F6F9",
            "gray-200": "#EBEDF3",
            "gray-300": "#E4E6EF",
            "gray-400": "#D1D3E0",
            "gray-500": "#B5B5C3",
            "gray-600": "#7E8299",
            "gray-700": "#5E6278",
            "gray-800": "#3F4254",
            "gray-900": "#181C32"
        }
    },
    "font-family": "Poppins"
};
        </script>
        <!--end::Global Config-->

    	<!--begin::Global Theme Bundle(used by all pages)-->
    	    	   <script src="assets/plugins/global/plugins.bundle.js"></script>
		    	   <script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
		    	   <script src="assets/js/scripts.bundle.js"></script>
				<!--end::Global Theme Bundle-->


                    <!--begin::Page Scripts(used by this page)-->
                            <script src="assets/js/pages/custom/login/login-general.js"></script>
                        <!--end::Page Scripts-->
            </body>
    <!--end::Body-->
</html>