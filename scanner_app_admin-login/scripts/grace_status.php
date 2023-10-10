<?php
session_start();
//accessing cookie values(*****) 
// $user_name_cookie= $_COOKIE["username_cookie"];
//accessing cookie values(*****) 
include_once ("../database_connection.php");
// $vendor_code = $_GET["g_vendor_code"];
// $grace_status = $_GET["grace_status"];
$grace_status = $_GET["myString"];
echo "hello";
// echo $vendor_code;
echo $grace_status;
// echo $d_vendor_code;
// $record_id = $vendor_code;
// $record_id = $_POST['vendor_code'];


if (isset($_GET["myString"])){
    echo $grace_status;
    echo "hello";
    

// if($grace_status == 1){
//     echo '<script>alert("Vendor already has active grace period")</script>';

// }

// $enable = $conn-> prepare('UPDATE vendor_registration SET vendor_status = 1 WHERE vendor_code=?');
// $enable->bind_param('s', $e_vendor_code);
// $enable->execute();
// // $result = $sql->get_result();
// var_dump($enable);
// header("Location: ../table.php");


}

//  if (isset($_GET["d_vendorcode"])){

//   $enable = $conn-> prepare('UPDATE vendor_registration SET vendor_status = 2 WHERE vendor_code=?');
//   $enable->bind_param('s', $d_vendor_code);
//   $enable->execute();
//   // $result = $sql->get_result();
//   // var_dump($enable);
//   header("Location: ../table.php");
  
//   }





?>