<?php
session_start();
//accessing cookie values(*****) 
// $user_name_cookie= $_COOKIE["username_cookie"];
//accessing cookie values(*****) 
include_once ("../database_connection.php");
$row_id = $_GET['row_id'];
$sub_id = $_GET['sub_id'];


// echo $row_id;
// echo $sub_id;


// $sql = "DELETE FROM subscription  WHERE id=".$sub_id."";
// var_dump($sql);
if (isset($_GET["row_id"])){
  echo $row_id;
  echo '</br>';
echo $sub_id;
$sql = $conn->prepare("UPDATE admin_subscription SET status=2 WHERE id = ? AND subscription_id =? ");
$sql->bind_param('is', $row_id,$sub_id);
$sql->execute();
header("Location: ../subscription.php");
// $sql = $conn->prepare("DELETE FROM subscription  WHERE id=".$sub_id."");
}


// if ($conn->query($sql) === TRUE) {
//   // var_dump($sql);
//   echo "Record updated successfully";
// } else {
//   echo "Error updating record: " . $conn->error;
// }


?>