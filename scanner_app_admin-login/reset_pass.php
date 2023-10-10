
   

<?php
include_once "database_connection.php";

$key_id = $_GET['key'];
$email = $_GET['email'];
$action_value = $_GET['action'];


// checking for password reset is true for each user who arrives on this page
if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"])
&& ($_GET["action"]=="reset") && !isset($_POST["action"]))
{
  // $key = $_GET["key"];
  // $email = $_GET["email"];
  $curDate = date("Y-m-d H:i:s", time());

//   $queryArray = array();
// parse_str($_SERVER['QUERY_STRING'],$queryArray);

  $error = '';

  // $email_str = urldecode($queryArray['email']);

  $check_key = $conn->prepare('SELECT * FROM admin_password_reset_temp WHERE key_id = ? AND email = ?');
  $check_key->bind_param('ss', $key_id, $email);
  $check_key->execute();
  $check_key_res = $check_key->get_result();
  $check_key_row = $check_key_res->fetch_assoc();

  if ($check_key_res->num_rows == '0')
  {
    ?><script>alert('The link is invalid/expired. Either you did not copy the correct link\nfrom the email, or you have already used the key in which case it is\ndeactivated.');window.location.href="login.php";</script><?php
  }
  else
  {
    $expDate = $check_key_row['expdate'];
    if ($expDate <= $curDate)
    {
      ?><script>alert("The link is expired. You are trying to use the expired link which is valid only 24 hours");window.location.href="login.php";</script><?php
    }
    else{
      ?><script>alert("you can reset your password");</script><?php

    }
  }
}
// checking for password reset is true for each user who comes on this website



//  reset password 

if(isset($_POST["email"]) && isset($_POST["key_id"]) && isset($_POST["pass1"]) && isset($_POST["pass2"]))
{
  ?><script>alert("inside reset");</script><?php
      $error="";
      $pass1 = $_POST["pass1"];
      $pass2 = $_POST["pass2"];
      $email = $_POST["email"];
      $key_id = $_POST["key_id"];
      $curDate = date("Y-m-d H:i:s", time());
      if ($pass1 != $pass2)
      {
        ?><script>alert("Password do not match, both password should be same");window.history.back();</script><?php
      }
      else
      {


        $get_vendor_code = $conn->prepare("SELECT * FROM admin_password_reset_temp WHERE email = ? AND key_id = ?");
        $get_vendor_code->bind_param('ss', $email, $key_id);
        $get_vendor_code->execute();
        $get_vendor_code_res = $get_vendor_code->get_result();
         $get_vendor_code_row = $get_vendor_code_res->fetch_assoc();
        $id = $get_vendor_code_row['id'];
        $vendor_code_to_reset = $get_vendor_code_row['vendor_code'];
        echo "<script>alert('$id')</script>";
        echo "<script>alert('$vendor_code_to_reset')</script>";

        if($get_vendor_code_res->num_rows > 0)
        {
          echo "<script>alert('inside update')</script>";
          
        $pass1 = password_hash($pass1, PASSWORD_DEFAULT);


        echo "<script>alert('$pass1')</script>";

        // updating the login_app table with new password
        $reset_pass = $conn->prepare('UPDATE admin_login SET admin_password = ? WHERE registered_email = ? ');
        $reset_pass->bind_param('ss', $pass1, $email);
        // $reset_pass->execute();

        // $delete_key = $conn->prepare('DELETE FROM password_reset_temp WHERE email = ? AND key_id = ?');
        // $delete_key->bind_param('ss', $email, $key_id);
        if($reset_pass->execute())
        {
        //   echo "<script>alert('update login_app')</script>";

        // $reset_pass = $conn->prepare('UPDATE vendor_registration SET vendor_password = ? WHERE vendor_email = ? AND vendor_code = ?');
        // $reset_pass->bind_param('sss', $pass1, $email, $vendor_code_to_reset);
        if($reset_pass->execute())
        {

          echo "<script>alert('update registration')</script>";
          // deleting the password reset row from password_reset table after the reset is completed

          $delete_key = $conn->prepare('DELETE FROM admin_password_reset_temp WHERE email= ? AND key_id = ?');
          $delete_key->bind_param('ss', $email, $key_id);
          if($delete_key->execute())
          {
            ?><script>alert('Your password has been updated successfully. Please log in to continue.');window.location.href="login.php";</script><?php
          }

        }
          
          
        }
        else{
          ?><script>alert('Your login details did not match please try resetting your password again.');window.location.href="login.php";</script><?php

        }

        }
        else{
          ?><script>alert("your reset password unique id did not match");</script><?php

        }


      }
  
}


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
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" >
    <!--begin::Head-->
    <head>
                <meta charset="utf-8"/>
        <title>Metronic | Forgot Password</title>
        <meta name="description" content="Forgot password page example"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>        <!--end::Fonts-->


                    <!--begin::Page Custom Styles(used by this page)-->
                             <link href="dist/assets/css/pages/login/login-3.css" rel="stylesheet" type="text/css"/>
                        <!--end::Page Custom Styles-->

        <!--begin::Global Theme Styles(used by all pages)-->
                    <link href="dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
                    <link href="dist/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css"/>
                    <link href="dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css"/>
                <!--end::Global Theme Styles-->

        <!--begin::Layout Themes(used by all pages)-->

<link href="dist/assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css"/>
<link href="dist/assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css"/>
<link href="dist/assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css"/>
<link href="dist/assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css"/>        <!--end::Layout Themes-->

        <link rel="shortcut icon" href="dist/assets/media/logos/favicon.ico"/>

            </head>
    <!--end::Head-->

    <!--begin::Body-->
    <body  id="kt_body"  class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading"  >

    	<!--begin::Main-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Login-->
<div class="login login-3 wizard d-flex flex-column flex-lg-row flex-column-fluid">
    <!--begin::Aside-->
    <div class="login-aside d-flex flex-column flex-row-auto">
        <!--begin::Aside Top-->
        <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
            <!--begin::Aside Header-->
            <a href="#" class="login-logo text-center pt-lg-25 pb-10">
				<img src="dist/assets/media/logos/logo-1.png" class="max-h-70px" alt=""/>
			</a>
            <!--end::Aside Header-->

            <!--begin::Aside Title-->
            <h3 class="font-weight-bolder text-center font-size-h4 text-dark-50  line-height-xl">
                User Experience & Interface Design<br/>
                Strategy SaaS Solutions
            </h3>
            <!--end::Aside Title-->
        </div>
        <!--end::Aside Top-->

        <!--begin::Aside Bottom-->
        <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-x-center"
            style="background-position-y: calc(100% + 5rem); background-image: url(dist/assets/media/svg/illustrations/login-visual-5.svg)">
        </div>
        <!--end::Aside Bottom-->
    </div>
    <!--begin::Aside-->

    <!--begin::Content-->
    <div class="login-content flex-column-fluid d-flex flex-column p-10">
        <!--begin::Top-->
        <div class="text-right d-flex justify-content-center">
            <div class="top-forgot text-right d-flex justify-content-end pt-5 pb-lg-0 pb-10">
    			<span class="font-weight-bold text-muted font-size-h4">Having issues?</span>
    			<a href="javascript:;" class="font-weight-bold text-primary font-size-h4 ml-2" id="kt_login_signup">Get Help</a>
    		</div>
		</div>
        <!--end::Top-->

        <!--begin::Wrapper-->
        <div class="d-flex flex-row-fluid flex-center">
            <!--begin::Forgot-->
            <div class="login-form">
                <!--begin::Form-->
                <form method='post' class="form" id="kt_login_reset_form">
                    <!--begin::Title-->
                    <div class="pb-5 pb-lg-15">

                        <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Forgotten Password ?</h3>
                        <p class="text-muted font-weight-bold font-size-h4">Enter your email to reset your password</p>
                    </div>
                    <!--end::Title-->

                    <!--begin::Form group-->
                    <div class="form-group">
                      <input  class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" value='<?php echo $email;?>' name="email" type='hidden'/>
                      <input class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" value='<?php echo $key_id;?>' name="key_id" type='hidden'/>
                      <input class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" type="password" placeholder="Enter your New Password" name="pass1" autocomplete="off"/>
                      <!-- <input class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" type="password" placeholder="Re-Enter your New Password" name="pass2" autocomplete="off"/> -->

                      </div>


                      <div class="form-group">
                    <input class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" type="password" placeholder="Re-Enter your New Password" name="pass2" autocomplete="off"/>

                      </div>
                    <!--end::Form group-->

                    <!--begin::Form group-->
                    <div class="form-group d-flex flex-wrap">
                    <button type="submit" id="kt_login_reset_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Submit</button>

                        <!-- <button type="submit" id="kt_login_forgot_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Submit</button>
                        <a href="custom/pages/login/login-3/signin.html"  id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</a> -->
                    </div>
                    <!--end::Form group-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Forgot-->
        </div>
        <!--end::Wrapper-->
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
    	    	   <script src="dist/assets/plugins/global/plugins.bundle.js"></script>
		    	   <script src="dist/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
		    	   <script src="dist/assets/js/scripts.bundle.js"></script>
				<!--end::Global Theme Bundle-->


                    <!--begin::Page Scripts(used by this page)-->
                    <!-- <script src="dist/assets/js/pages/custom/login/login-general.js"></script> -->
                            <!-- <script src="dist/assets/js/pages/custom/login/login-3.js"></script> -->
                        <!--end::Page Scripts-->

                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

$(document).ready(function() {

	$('#kt_login_reset_submit').on('click', function() {

		
		$("#kt_login_reset_form").submit();

	});
});
</script>
            </body>
    <!--end::Body-->
</html>
© 2022 GitHub, Inc.
Terms
Privacy
Security
Status
Docs
Contact GitHub
Pricing
API
Training
Blog
About
