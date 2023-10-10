<?php
session_start();
//accessing cookie values(*****) 
// $user_name_cookie= $_COOKIE["username_cookie"];
//accessing cookie values(*****) 
include_once ("../database_connection.php");
$e_vendor_code = $_GET["e_vendorcode"];
$d_vendor_code = $_GET["d_vendorcode"];
echo $e_vendor_code;
// echo $d_vendor_code;
// $record_id = $vendor_code;
// $record_id = $_POST['vendor_code'];


if (isset($_GET["e_vendorcode"]))

{

$enable = $conn-> prepare('UPDATE vendor_registration SET vendor_status = 1 WHERE vendor_code=?');
$enable->bind_param('s', $e_vendor_code);
$enable->execute();

$enable_app = $conn-> prepare('UPDATE login_app SET status = 1 WHERE vendor_code=?');
$enable_app->bind_param('s', $e_vendor_code);
$enable_app->execute();

header("Location: ../view_registered_vendors.php");

}
// if (isset($_GET["e_vendorcode"])){

// // // $enable = $conn-> prepare('UPDATE vendor_registration SET vendor_status = 1 WHERE vendor_code=?');
// // // $enable->bind_param('s', $e_vendor_code);
// // // $enable->execute();

// // $enable_app = $conn-> prepare('UPDATE login_app SET status = 1 WHERE vendor_code=?');
// // $enable_app->bind_param('s', $e_vendor_code);
// // $enable_app->execute();
// // // $result = $sql->get_result();
// // // var_dump($enable);
// // // header("Location: ../view_registered_vendors.php");

// // }

 if (isset($_GET["d_vendorcode"])){

  $disable = $conn-> prepare('UPDATE vendor_registration SET vendor_status = 2 WHERE vendor_code=?');
  $disable->bind_param('s', $d_vendor_code);
  $disable->execute();

  
  $disable_app = $conn-> prepare('UPDATE login_app SET status = 2 WHERE vendor_code=?');
  $disable_app->bind_param('s', $d_vendor_code);
  $disable_app->execute();
  // $result = $sql->get_result();
  // var_dump($enable);
  header("Location: ../view_registered_vendors.php");
  
  }



//  if($_POST["disable"])
// {

// $sql = "UPDATE vendor_registration SET vendor_status = 2 WHERE vendor_code=".$record_id."";

// }

// if ($conn->query($enable) === TRUE) {
//   var_dump($sql);

//   echo "Record updated successfully";
// } else {
//   echo "Error updating record: " . $conn->error;
//   // header("Location: http://localhost/Seguro.Com/table.php"); 
// }


?>