	<?php
	include_once ("database_connection.php");
	$vendor_code = $_GET["vendorcode"];
	// session_start();


	// //stop error
	// error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);


	//accessing cookie values(*****) 
	
	$admin_fetch = $conn->prepare("SELECT * FROM admin_login");
	$admin_fetch->execute();
	$admin_fetch_res = $admin_fetch->get_result();
	$row_admin = $admin_fetch_res->fetch_assoc();

	$api_data = $conn->prepare("SELECT * FROM api WHERE vendor_code=?");
	$api_data->bind_param('s', $vendor_code );
	$api_data->execute();
	$result = $api_data->get_result();
	$row = $result->fetch_assoc();
		
		$sub_status = $row['subscription_status'];
		$payment_status = $row['payment_status'];
		$grace_status = $row['grace_status'];
		if($payment_status == '1'){

			if($sub_status == '1' && $grace_status == '1'){
				echo '<script>alert("vendor already has active grace period")</script>';
				//header('location: view_registered_vendors.php');
			}

			if($sub_status == '2' && $grace_status == '1'){
				echo '<script>alert("vendor already has active grace period")</script>';
			}

			if($sub_status == '0' && $grace_status == '1'){
				echo '<script>alert("vendor already has active grace period")</script>';
			}
			
		}

		if($payment_status == '2'){

			if($sub_status == '0' && $grace_status == '3'){
				echo '<script>alert("vendor already has not paid ")</script>';
			}


			if($sub_status == '2' && $grace_status == '3'){
				echo '<script>alert("vendor already has not paid ")</script>';
				
			}

		}



						

	// $user_name_cookie= $_COOKIE["username_cookie"];
	//accessing cookie values(*****) 
	// $vendor_code = $_GET["vendor_code"];
	




	if(isset($_POST['Grace_period']))
	{	
		// $vendor_code = $_GET["vendorcode"];
		
		// $today = date("Y-m-d",strtotime($today. "+ 0 days"));
		$number_of_days = $_POST['no_of_days'];
		$amount = $_POST['amount'];
		$vendor_code = $vendor_code;
		// $grace_period_start = $today;
		// $grace_end_date = date('Y-m-d', strtotime($final_date. "+ $number_of_days days"));


		// $grace_end_date = date('Y-m-d', strtotime($today. "+ 1 days"));
		echo "<script>alert('$today')</script>";
		$api_data = $conn->prepare("SELECT * FROM api WHERE vendor_code=?");
		$api_data->bind_param('s', $vendor_code );
		$api_data->execute();
		$result = $api_data->get_result();


		if($result->num_rows=='1'){
			 
		$row = $result->fetch_assoc();
		$final_date = $row['final_end'];
		$sub_status = $row['subscription_status'];
		$sub_start_Date =  $row['sub_start_date'];
		$sub_end_Date = $row['sub_end_date'];
		$payment_status = $row['payment_status'];
		$grace_status = $row['grace_status'];

		$today = date("Y-m-d",strtotime($today. "+ 0 days"));
		$grace_period_start = $final_date;
		$grace_end_date = date('Y-m-d', strtotime($final_date. "+ $number_of_days days +1days"));

		

			// $grace_end = date('Y-m-d', strtotime($sub_start_Date. "+ 1 days"));
			echo '<script>alert("sub date")</script>';
			echo "<script>alert('$sub_start_Date')</script>";
		// echo '<script>alert('.$sub_start_Date.')</script>';
		// echo '<script>alert('.$sub_end_Date.')</script>';
		// echo '<script>alert('.$payment_status.')</script>';
		// echo '<script>alert('.$grace_status.')</script>';

		// $today = date("Y-m-d");

			//checking if payments are active
			if($payment_status == '1'){

				

				if($sub_status == '1' && $grace_status == '2'){
			$get_grace_id = $conn->prepare("SELECT id FROM admin_grace_period ORDER BY id DESC LIMIT 1");
			$get_grace_id->execute();
			$get_grace_id_res = $get_grace_id->get_result();
			$get_grace_id_row = $get_grace_id_res->fetch_assoc();

			$grace_unique_id = $get_grace_id_row['id']; 

			$grace_unique_id_second = $grace_unique_id + 1;
			$grace_unique_id_third = $grace_unique_id_second + 1;
			$grace_unique_id_fourth = $grace_unique_id_second + $grace_unique_id_third;
			// Convert a hexadecimal number to octal number:
			$grace_unique_id_fourth = base_convert($grace_unique_id_fourth,16,8);
			$admin_business_name = 'seguro@';

			$grace_id = $admin_business_name."".$grace_unique_id."".$grace_unique_id_fourth;

			$grace_insert = $conn->prepare('INSERT INTO admin_grace_period (grace_id,no_of_days,amount,vendor_code,grace_start_date,grace_end_date) VALUES (?,?,?,?,?,?)');
			$grace_insert->bind_param('ssssss', $grace_id,$number_of_days,$amount,$vendor_code,$final_date,$grace_end_date );
			$grace_insert->execute();


			// sub is not ended but grace period is given 
		// if ( $today == $grace_period_start && $today <= $final_date){

			// $final_end_date=date_create($final_date);
			// $grace_start_date=date_create($grace_period_start);
			// $date_diff=date_diff( $final_end_date,$grace_start_date);
			// $sub_ends_in=$date_diff->format("%a");


			// $grace_end = date('Y-m-d', strtotime($grace_start. "+ $number_of_days days"));
			// $final_end_date = date('Y-m-d', strtotime($final_date . " + $number_of_days days"));
			//$final_end_date = date('Y-m-d', strtortime($grace_end_date. "+1 days"));
			$final_end_date = $grace_end_date;

			echo "<script>alert('$final_end_date')</script>";


			$end_date = $conn-> prepare('UPDATE api SET final_end = ?,grace_id = ?,grace_start_date = ?,grace_end_date = ?,	payment_status=1,grace_status=1 Where vendor_code = ? ');
			$end_date->bind_param('sssss', $final_end_date,$grace_id,$final_date,$final_end_date,$vendor_code);
			$end_date->execute();

		// }

		}

	

		if($sub_status == '1' && $grace_status == '0'){
			

			$get_grace_id = $conn->prepare("SELECT id FROM admin_grace_period ORDER BY id DESC LIMIT 1");
			$get_grace_id->execute();
			$get_grace_id_res = $get_grace_id->get_result();
			$get_grace_id_row = $get_grace_id_res->fetch_assoc();

			$grace_unique_id = $get_grace_id_row['id']; 

			$grace_unique_id_second = $grace_unique_id + 1;
			$grace_unique_id_third = $grace_unique_id_second + 1;
			$grace_unique_id_fourth = $grace_unique_id_second + $grace_unique_id_third;
			// Convert a hexadecimal number to octal number:
			$grace_unique_id_fourth = base_convert($grace_unique_id_fourth,16,8);
			$admin_business_name = 'seguro@';

			$grace_id = $admin_business_name."".$grace_unique_id."".$grace_unique_id_fourth;

			$grace_insert = $conn->prepare('INSERT INTO admin_grace_period (grace_id,no_of_days,amount,vendor_code,grace_start_date,grace_end_date) VALUES (?,?,?,?,?,?)');
			$grace_insert->bind_param('ssssss', $grace_id,$number_of_days,$amount,$vendor_code,$final_date,$grace_end_date );
			$grace_insert->execute();


			// sub is not ended but grace period is given 
		// if ( $today == $grace_period_start && $today <= $final_date){

			// $final_end_date=date_create($final_date);
			// $grace_start_date=date_create($grace_period_start);
			// $date_diff=date_diff( $final_end_date,$grace_start_date);
			// $sub_ends_in=$date_diff->format("%a");


			// $grace_end = date('Y-m-d', strtotime($grace_start. "+ $number_of_days days"));
			// $final_end_date = date('Y-m-d', strtotime($final_date . " + $number_of_days days"));
			$final_end_date = $grace_end_date;
		//	$final_end_date = date('Y-m-d', strtortime($final_end_date. "+1 days"));

			echo "<script>alert('$final_end_date')</script>";


			$end_date = $conn-> prepare('UPDATE api SET final_end = ?,grace_id = ?,grace_start_date = ?,grace_end_date = ?,	payment_status=1,grace_status=1 Where vendor_code = ? ');
			$end_date->bind_param('sssss', $final_end_date,$grace_id,$final_date,$final_end_date,$vendor_code);
			$end_date->execute();

		}

		
	}	

		if($payment_status == '2'){

			if($sub_status == '2' && $grace_status == '0'){

			$get_grace_id = $conn->prepare("SELECT id FROM admin_grace_period ORDER BY id DESC LIMIT 1");
			$get_grace_id->execute();
			$get_grace_id_res = $get_grace_id->get_result();
			$get_grace_id_row = $get_grace_id_res->fetch_assoc();

			$grace_unique_id = $get_grace_id_row['id']; 

			$grace_unique_id_second = $grace_unique_id + 1;
			$grace_unique_id_third = $grace_unique_id_second + 1;
			$grace_unique_id_fourth = $grace_unique_id_second + $grace_unique_id_third;
			// Convert a hexadecimal number to octal number:
			$grace_unique_id_fourth = base_convert($grace_unique_id_fourth,16,8);
			$admin_business_name = 'seguro@';

			$grace_id = $admin_business_name."".$grace_unique_id."".$grace_unique_id_fourth;

			$grace_insert = $conn->prepare('INSERT INTO admin_grace_period (grace_id,no_of_days,amount,vendor_code,grace_start_date,grace_end_date) VALUES (?,?,?,?,?,?)');
			$grace_insert->bind_param('ssssss', $grace_id,$number_of_days,$amount,$vendor_code,$final_date,$grace_end_date );
			$grace_insert->execute();


			// sub is not ended but grace period is given 
		// if ( $today == $grace_period_start && $today <= $final_date){

			// $final_end_date=date_create($final_date);
			// $grace_start_date=date_create($grace_period_start);
			// $date_diff=date_diff( $final_end_date,$grace_start_date);
			// $sub_ends_in=$date_diff->format("%a");


			// $grace_end = date('Y-m-d', strtotime($grace_start. "+ $number_of_days days"));
			// $final_end_date = date('Y-m-d', strtotime($final_date . " + $number_of_days days"));
			// $final_end_date = date('Y-m-d', strtortime($grace_end_date. "+1 days"));
			$final_end_date = $grace_end_date;

			echo "<script>alert('$final_end_date')</script>";


			$end_date = $conn-> prepare('UPDATE api SET final_end = ?,grace_id = ?,grace_start_date = ?,grace_end_date = ?,	payment_status=1,grace_status=1 Where vendor_code = ? ');
			$end_date->bind_param('sssss', $final_end_date,$grace_id,$final_date,$final_end_date,$vendor_code);
			$end_date->execute();

			}

			
			if($sub_status == '2' && $grace_status == '2'){
				$get_grace_id = $conn->prepare("SELECT id FROM admin_grace_period ORDER BY id DESC LIMIT 1");
			$get_grace_id->execute();
			$get_grace_id_res = $get_grace_id->get_result();
			$get_grace_id_row = $get_grace_id_res->fetch_assoc();

			$grace_unique_id = $get_grace_id_row['id']; 

			$grace_unique_id_second = $grace_unique_id + 1;
			$grace_unique_id_third = $grace_unique_id_second + 1;
			$grace_unique_id_fourth = $grace_unique_id_second + $grace_unique_id_third;
			// Convert a hexadecimal number to octal number:
			$grace_unique_id_fourth = base_convert($grace_unique_id_fourth,16,8);
			$admin_business_name = 'seguro@';

			$grace_id = $admin_business_name."".$grace_unique_id."".$grace_unique_id_fourth;

			$grace_insert = $conn->prepare('INSERT INTO admin_grace_period (grace_id,no_of_days,amount,vendor_code,grace_start_date,grace_end_date) VALUES (?,?,?,?,?,?)');
			$grace_insert->bind_param('ssssss', $grace_id,$number_of_days,$amount,$vendor_code,$final_date,$grace_end_date );
			$grace_insert->execute();


			// sub is not ended but grace period is given 
		// if ( $today == $grace_period_start && $today <= $final_date){

			// $final_end_date=date_create($final_date);
			// $grace_start_date=date_create($grace_period_start);
			// $date_diff=date_diff( $final_end_date,$grace_start_date);
			// $sub_ends_in=$date_diff->format("%a");


			// $grace_end = date('Y-m-d', strtotime($grace_start. "+ $number_of_days days"));
			// $final_end_date = date('Y-m-d', strtotime($final_date . " + $number_of_days days"));
			// $final_end_date = date('Y-m-d', strtortime($grace_end_date. "+1 days"));
			$final_end_date = $grace_end_date;


			echo "<script>alert('$final_end_date')</script>";


			$end_date = $conn-> prepare('UPDATE api SET final_end = ?,grace_id = ?,grace_start_date = ?,grace_end_date = ?,	payment_status=1,grace_status=1 Where vendor_code = ? ');
			$end_date->bind_param('sssss', $final_end_date,$grace_id,$final_date,$final_end_date,$vendor_code);
			$end_date->execute();
			}

		}
}else{
				$get_grace_id = $conn->prepare("SELECT id FROM admin_grace_period ORDER BY id DESC LIMIT 1");
				$get_grace_id->execute();
				$get_grace_id_res = $get_grace_id->get_result();
				$get_grace_id_row = $get_grace_id_res->fetch_assoc();

				$grace_unique_id = $get_grace_id_row['id']; 

				$grace_unique_id_second = $grace_unique_id + 1;
				$grace_unique_id_third = $grace_unique_id_second + 1;
				$grace_unique_id_fourth = $grace_unique_id_second + $grace_unique_id_third;
				// Convert a hexadecimal number to octal number:
				$grace_unique_id_fourth = base_convert($grace_unique_id_fourth,16,8);
				$admin_business_name = 'seguro@';

				$grace_id = $admin_business_name."".$grace_unique_id."".$grace_unique_id_fourth;

				$grace_insert = $conn->prepare('INSERT INTO admin_grace_period (grace_id,no_of_days,amount,vendor_code,grace_start_date,grace_end_date) VALUES (?,?,?,?,?,?)');
				$grace_insert->bind_param('ssssss', $grace_id,$number_of_days,$amount,$vendor_code,$today,$grace_end_date );
				$grace_insert->execute();

				// if($today==$grace_period_start){
					$final_end = date('Y-m-d', strtotime($today. " + $number_of_days days"));
					//INSERT THE DATE INTO API TABLE
					$payment_status=1;
					$grace_status=1;
					$api_insert = $conn->prepare('INSERT INTO api (vendor_code,grace_id,grace_start_date,grace_end_date,final_end,payment_status,grace_status) VALUES (?,?,?,?,?,?,?)');
					$api_insert->bind_param('sssssss', $vendor_code,$grace_id,$grace_period_start,$grace_end_date,$final_end,$payment_status,$grace_status  );
					$api_insert->execute();
				// 	$end_date = $conn-> prepare('UPDATE api SET final_end = ? Where vendor_code =? ');
				// 	$end_date->bind_param('ss', $final_end,$vendor_code);
				// 	$end_date->execute();
				// }
			// }
		}
	}


		// $get_grace_id = $conn->prepare("SELECT id FROM admin_grace_period ORDER BY id DESC LIMIT 1");
		// $get_grace_id->execute();
		// $get_grace_id_res = $get_grace_id->get_result();
		// $get_grace_id_row = $get_grace_id_res->fetch_assoc();

		// $grace_unique_id = $get_grace_id_row['id']; 

		// $grace_unique_id_second = $grace_unique_id + 1;
		// $grace_unique_id_third = $grace_unique_id_second + 1;
		// $grace_unique_id_fourth = $grace_unique_id_second + $grace_unique_id_third;
		// // Convert a hexadecimal number to octal number:
		// $grace_unique_id_fourth = base_convert($grace_unique_id_fourth,16,8);
		// $admin_business_name = 'seguro@';

		// $grace_id = $admin_business_name."".$grace_unique_id."".$grace_unique_id_fourth;
		
		// $vendor_code = $_POST['vendor_code'];
		// $api_data = $conn->prepare("SELECT * FROM api WHERE vendor_code=?");
		// $api_data->bind_param('s', $vendor_code );
		// $api_data->execute();
		// $result = $api_data->get_result();
		// $row = $result->fetch_assoc();
		// $final_date = $row['final_end'];
		// echo '<script>alert('.$final_date.')</script>';
		// if($result->num_rows=='1'){
		// 	$row = $result->fetch_assoc();
		// 	$sub_id = $row['subscription_id'];
		// 	// echo '<script>alert('.$sub_id.')</script>';
		// 	$sub_status = $row['subscription_status'];
		// 	$sub_start_Date =  $row['sub_start_date'];
		// 	$sub_end_Date = $row['sub_end_date'];
		// 	$payment_status = $row['payment_status'];
		// 	$grace_status = $row['grace_status'];
		// 	$final_date = $row['final_end'];
			// echo '<script>alert('.$final_date.')</script>';
			

		// 	//checking if payments are active
		// 	if($payment_status == '1'){

		// 		if($sub_status == '1' && $grace_status == '1'){
		// 			echo '<script>alert("vendor already has active grace period")</script>';
		// 		}

		// 		if($sub_status == '1' && $grace_status == '2'){
		// 	$get_grace_id = $conn->prepare("SELECT id FROM admin_grace_period ORDER BY id DESC LIMIT 1");
		// 	$get_grace_id->execute();
		// 	$get_grace_id_res = $get_grace_id->get_result();
		// 	$get_grace_id_row = $get_grace_id_res->fetch_assoc();

		// 	$grace_unique_id = $get_grace_id_row['id']; 

		// 	$grace_unique_id_second = $grace_unique_id + 1;
		// 	$grace_unique_id_third = $grace_unique_id_second + 1;
		// 	$grace_unique_id_fourth = $grace_unique_id_second + $grace_unique_id_third;
		// 	// Convert a hexadecimal number to octal number:
		// 	$grace_unique_id_fourth = base_convert($grace_unique_id_fourth,16,8);
		// 	$admin_business_name = 'seguro@';

		// 	$grace_id = $admin_business_name."".$grace_unique_id."".$grace_unique_id_fourth;

		// 	$grace_insert = $conn->prepare('INSERT INTO admin_grace_period (grace_id,no_of_days,amount,vendor_code,grace_start_date,grace_end_date) VALUES (?,?,?,?,?,?)');
		// 	$grace_insert->bind_param('ssssss', $grace_id,$number_of_days,$amount,$vendor_code,$grace_period_start,$grace_end_date );
		// 	$grace_insert->execute();

		// 	echo '<script>alert('.$sub_end_Date.')</script>';

		// 	// sub is not ended but grace period is given 
		// if ($today < $sub_end_Date && $today == $grace_start){

		// 	echo '<script>alert('.$sub_end_Date.')</script>';

		// 	$sub_start_date=date_create($sub_start_Date);
		// 	$sub_end_date=date_create($sub_end_Date);
		// 	$sub_diff=date_diff( $sub_start_date,$sub_end_date);
		// 	$sub_ends_in=$sub_diff->format("%a");

		// 	$grace_end = date('Y-m-d', strtotime($grace_start. "+ $number_of_days days"));
		// 	$final_end = date('Y-m-d', strtotime($grace_end. "+ $sub_ends_in days + 1 days"));

		// 	$end_date = $conn-> prepare('UPDATE api SET final_end = ? Where vendor_code=? ');
		// 	$end_date->bind_param('ss', $final_end,$vendor_code);
		// 	$end_date->execute();

		// }

		// 		}

		// 	}


		// }else{

		// }



		





		//calculating grace end date

			// echo '<script>alert('.$payment_status.')</script>';



		// if($payment_status == 2 && $sub_status == 2 && $grace_status == 0){

		// 	echo '<script>alert("Welcome to Geeks for Geeks")</script>';


		// $grace_insert = $conn->prepare('INSERT INTO admin_grace_period (grace_id,no_of_days,amount,vendor_code,grace_start_date,grace_end_date) VALUES (?,?,?,?,?,?)');
		// $grace_insert->bind_param('ssssss', $grace_id,$number_of_days,$amount,$vendor_code,$grace_period_start,$grace_end_date );
		// $grace_insert->execute();



		// // sub is not ended but grace period is given 
		// if ($today < $sub_end_Date && $today == $grace_start){

		// 	$sub_start_date=date_create($sub_start_Date);
		// 	$sub_end_date=date_create($sub_end_Date);
		// 	$sub_diff=date_diff( $sub_start_date,$sub_end_date);
		// 	$sub_ends_in=$sub_diff->format("%a");

		// 	$grace_end = date('Y-m-d', strtotime($grace_start. "+ $number_of_days days"));
		// 	$final_end = date('Y-m-d', strtotime($grace_end. "+ $sub_ends_in days + 1 days"));

		// 	$end_date = $conn-> prepare('UPDATE api SET final_end = ? Where id=1 ');
		// 	$end_date->bind_param('s', $final_end);
		// 	$end_date->execute();

		// }

		


		// $grace_status_update = $conn->prepare('UPDATE admin_grace_period SET grace_status = 1 Where vendor_code =? ');
		// $grace_status_update->bind_param('s', $vendor_code);
		// $grace_status_update->execute();



		// }

		// echo '<script>alert('.$vendor_code.')</script>';
		
		// $grace_data = $conn->prepare("SELECT * FROM admin_grace_period WHERE vendor_code=?");
		// $grace_data->bind_param('s', $vendor_code );
		// $grace_data->execute();
		// $result = $grace_data->get_result();
		// $row = $result->fetch_assoc();
		// $grace_id = $row['grace_id'];
		// $grace_status = $row['grace_status'];
		// $no_of_days = $row['no_of_days'];
		// $grace_start = $row['grace_start_date'];
		// $grace_end = $row['grace_end_date'];


		//sub is ended and grace period is started on the same day
		// if ($today == $sub_end_Date && $today == $grace_start ){

		// 	//calculate final end date
		// 	 $final_end = date('Y-m-d', strtotime($grace_end. " + 2 days"));
		// 	 //INSERT THE DATE INTO API TABLE
		// 	 $end_date = $conn-> prepare('UPDATE api SET final_end = ? Where vendor_code =? ');
		// 	 $end_date->bind_param('ss', $final_end,$vendor_code);
		// 	 $end_date->execute();

		// }


		// sub is not ended but grace period is given 
		// if ($today < $sub_end_Date && $today == $grace_start){

		// 	$sub_start_date=date_create($sub_start_Date);
		// 	$sub_end_date=date_create($sub_end_Date);
		// 	$sub_diff=date_diff( $sub_start_date,$sub_end_date);
		// 	$sub_ends_in=$sub_diff->format("%a");

		// 	$grace_end = date('Y-m-d', strtotime($grace_start. "+ $number_of_days days"));
		// 	$final_end = date('Y-m-d', strtotime($grace_end. "+ $sub_ends_in days + 1 days"));

		// 	$end_date = $conn-> prepare('UPDATE api SET final_end = ? Where id=1 ');
		// 	$end_date->bind_param('s', $final_end);
		// 	$end_date->execute();

		// }

		// if($today > $sub_end_Date && $today == $grace_start ){
		// 	$final_end = date('Y-m-d', strtotime($grace_start. "+  $number_of_days days + 1 days"));
		// 	//INSERT THE DATE INTO API TABLE
		// 	$end_date = $conn-> prepare('UPDATE api SET final_end = ? Where id=1 ');
		// 	$end_date->bind_param('s', $final_end);
		// 	$end_date->execute();

		// }

		// header("Refresh:0; url=Add_grace_period.php");



	//}

	?>






	<!DOCTYPE html>

	<html lang="en" >
		<!--begin::Head-->
		<head>
			<!-- <base href="dist/"> -->
					<meta charset="utf-8"/>
			<title>Seguro</title>
			<meta name="description" content="Multi column form examples"/>
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

			<!--begin::Fonts-->
			<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>        <!--end::Fonts-->

			

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

			<link rel="shortcut icon" href="dist/assets/media/logos/seguro_favicon.ico"/>

				</head>
		<!--end::Head-->

		<!--begin::Body-->
		<body  id="kt_body"  class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading"  >

			<!--begin::Main-->
		<!--begin::Header Mobile-->
	<div id="kt_header_mobile" class="header-mobile align-items-center  header-mobile-fixed " >
		<!--begin::Logo-->
		<a href="index.html">
			<img alt="Logo" src="dist/assets/media/logos/logo_mobile.png"/>
		</a>
		<!--end::Logo-->

		<!--begin::Toolbar-->
		<div class="d-flex align-items-center">
						<!--begin::Aside Mobile Toggle-->
				<button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
					<span></span>
				</button>
				<!--end::Aside Mobile Toggle-->

						<!--begin::Header Menu Mobile Toggle-->
				<button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
					<span></span>
				</button>
				<!--end::Header Menu Mobile Toggle-->

			<!--begin::Topbar Mobile Toggle-->
			<button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
				<span class="svg-icon svg-icon-xl"><!--begin::Svg Icon | path:dist/assets/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
			<polygon points="0 0 24 0 24 24 0 24"/>
			<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
			<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
		</g>
	</svg><!--end::Svg Icon--></span>		</button>
			<!--end::Topbar Mobile Toggle-->
		</div>
		<!--end::Toolbar-->
	</div>
	<!--end::Header Mobile-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">

	<!--begin::Aside-->
	<div class="aside aside-left  aside-fixed  d-flex flex-column flex-row-auto"  id="kt_aside">
		<!--begin::Brand-->
		<div class="brand flex-column-auto " id="kt_brand">
			<!--begin::Logo-->
			<a href="index.html" class="brand-logo">
				<img alt="Logo" src="dist/assets/media/logos/seguro.png" class="img-fluid"/>
			</a>
			<!--end::Logo-->

						<!--begin::Toggle-->
				
				<!--end::Toolbar-->
				</div>
		<!--end::Brand-->

		<!--begin::Aside Menu-->
		<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

			<!--begin::Menu Container-->
			<div
				id="kt_aside_menu"
				class="aside-menu my-4 "
				data-menu-vertical="1"
				data-menu-scroll="1" data-menu-dropdown-timeout="500" 			>
				<!--begin::Menu Nav-->
				<ul class="menu-nav ">
				<li class="menu-item " aria-haspopup="true" ><a  href="view_registered_vendors.php" class="menu-link "><span class="svg-icon menu-icon"><!--begin::Svg Icon | path:dist/assets/media/svg/icons/Design/Layers.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
			<polygon points="0 0 24 0 24 24 0 24"/>
			<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"/>
			<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"/>
		</g>
	</svg><!--end::Svg Icon--></span><span class="menu-text">Dashboard</span></a></li>

	<li class="menu-item " aria-haspopup="true" ><a  href="view_registered_vendors.php" class="menu-link "><span class="svg-icon menu-icon"><!--begin::Svg Icon | path:dist/assets/media/svg/icons/Design/Layers.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M10,4 L21,4 C21.5522847,4 22,4.44771525 22,5 L22,7 C22,7.55228475 21.5522847,8 21,8 L10,8 C9.44771525,8 9,7.55228475 9,7 L9,5 C9,4.44771525 9.44771525,4 10,4 Z M10,10 L21,10 C21.5522847,10 22,10.4477153 22,11 L22,13 C22,13.5522847 21.5522847,14 21,14 L10,14 C9.44771525,14 9,13.5522847 9,13 L9,11 C9,10.4477153 9.44771525,10 10,10 Z M10,16 L21,16 C21.5522847,16 22,16.4477153 22,17 L22,19 C22,19.5522847 21.5522847,20 21,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,17 C9,16.4477153 9.44771525,16 10,16 Z" fill="#000000"/>
        <rect fill="#000000" opacity="0.3" x="2" y="4" width="5" height="16" rx="1"/>
    </g>
</svg><!--end::Svg Icon--></span><span class="menu-text">View Registered Vendors</span></a></li>

	<li class="menu-item " aria-haspopup="true" ><a  href="vendors_with_grace_period.php" class="menu-link "><span class="svg-icon menu-icon"><!--begin::Svg Icon | path:dist/assets/media/svg/icons/Design/Layers.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3"/>
        <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000"/>
    </g>
	</svg><!--end::Svg Icon--></span><span class="menu-text">View Users With Grace Period</span></a></li>

	<li class="menu-item " aria-haspopup="true" ><a  href="subscription.php" class="menu-link "><span class="svg-icon menu-icon"><!--begin::Svg Icon | path:dist/assets/media/svg/icons/Design/Layers.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <rect fill="#000000" opacity="0.3" x="4" y="5" width="16" height="6" rx="1.5"/>
        <rect fill="#000000" x="4" y="13" width="16" height="6" rx="1.5"/>
    </g>
	</svg><!--end::Svg Icon--></span><span class="menu-text">Add Subscriptional Modal</span></a></li>

	<li class="menu-item " aria-haspopup="true" ><a  href="view_vendor_payments.php" class="menu-link "><span class="svg-icon menu-icon"><!--begin::Svg Icon | path:dist/assets/media/svg/icons/Design/Layers.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <rect fill="#000000" opacity="0.3" x="4" y="4" width="8" height="16"/>
        <path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
	</svg><!--end::Svg Icon--></span><span class="menu-text">View Paid Vendors</span></a></li>

	<li class="menu-item " aria-haspopup="true" ><a  href="change_password.php" class="menu-link "><span class="svg-icon menu-icon"><!--begin::Svg Icon | path:dist/assets/media/svg/icons/Design/Layers.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
		  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M2,13 C2,12.5 2.5,12 3,12 C3.5,12 4,12.5 4,13 C4,13.3333333 4,15 4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 C2,15 2,13.3333333 2,13 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <rect fill="#000000" opacity="0.3" x="11" y="2" width="2" height="14" rx="1"/>
        <path d="M12.0362375,3.37797611 L7.70710678,7.70710678 C7.31658249,8.09763107 6.68341751,8.09763107 6.29289322,7.70710678 C5.90236893,7.31658249 5.90236893,6.68341751 6.29289322,6.29289322 L11.2928932,1.29289322 C11.6689749,0.916811528 12.2736364,0.900910387 12.6689647,1.25670585 L17.6689647,5.75670585 C18.0794748,6.12616487 18.1127532,6.75845471 17.7432941,7.16896473 C17.3738351,7.57947475 16.7415453,7.61275317 16.3310353,7.24329415 L12.0362375,3.37797611 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
	</svg><!--end::Svg Icon--></span><span class="menu-text">Change Password</span></a></li>
	<li class="menu-item " aria-haspopup="true" ><a  href="transactions.php" class="menu-link "><span class="svg-icon menu-icon"><!--begin::Svg Icon | path:dist/assets/media/svg/icons/Design/Layers.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
		  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M2,13 C2,12.5 2.5,12 3,12 C3.5,12 4,12.5 4,13 C4,13.3333333 4,15 4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 C2,15 2,13.3333333 2,13 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <rect fill="#000000" opacity="0.3" x="11" y="2" width="2" height="14" rx="1"/>
        <path d="M12.0362375,3.37797611 L7.70710678,7.70710678 C7.31658249,8.09763107 6.68341751,8.09763107 6.29289322,7.70710678 C5.90236893,7.31658249 5.90236893,6.68341751 6.29289322,6.29289322 L11.2928932,1.29289322 C11.6689749,0.916811528 12.2736364,0.900910387 12.6689647,1.25670585 L17.6689647,5.75670585 C18.0794748,6.12616487 18.1127532,6.75845471 17.7432941,7.16896473 C17.3738351,7.57947475 16.7415453,7.61275317 16.3310353,7.24329415 L12.0362375,3.37797611 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
	</svg><!--end::Svg Icon--></span><span class="menu-text">Transactions</span></a>

		<!-- adding space -->
	<li class="menu-section ">
					
					<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
				</li>


				<!-- adding space -->


				
				
				</ul>			<!--end::Menu Nav-->
			</div>
			<!--end::Menu Container-->
		</div>
		<!--end::Aside Menu-->
	</div>
	<!--end::Aside-->

				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<!--begin::Header-->
	<div id="kt_header" class="header  header-fixed " >
		<!--begin::Container-->
		<div class=" container-fluid  d-flex align-items-stretch justify-content-between">
						<!--begin::Header Menu Wrapper-->
				<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
									<!--begin::Header Menu-->
					<div id="kt_header_menu" class="header-menu header-menu-mobile  header-menu-layout-default " >
						<!--begin::Header Nav-->

						<!--end::Header Nav-->
					</div>
					<!--end::Header Menu-->
				</div>
				<!--end::Header Menu Wrapper-->

			<!--begin::Topbar-->
			<div class="topbar">
													<!--begin::Search-->
						
						<!--end::Search-->

					

						
						<!--end::Quick Actions-->

													<!--begin::Cart-->
					
						<!--end::Cart-->

								<!--begin::Quick panel-->
					
					<!--end::Quick panel-->

								<!--begin::Chat-->
					
					<!--end::Chat-->

								<!--begin::Languages-->
				
					<!--end::Languages-->

													<!--begin::User-->
						<div class="topbar-item">
							<div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
								<span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
								<span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">Admin</span>
								<span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
									<span class="symbol-label font-size-h5 font-weight-bold">A</span>
								</span>
							</div>
						</div>
						<!--end::User-->
										</div>
			<!--end::Topbar-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Header-->

					<!--begin::Content-->
					<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">




	<!-- sub header ********************************************************************************************* -->
												<!--begin::Subheader-->
	<!-- <div class="subheader py-2 py-lg-6  subheader-solid " id="kt_subheader">
		<div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
			
		</div>
	</div> -->
	<!--end::Subheader-->

	<!-- sub header ********************************************************************************************* -->


						<!--begin::Entry-->
		<div class="d-flex flex-column-fluid">
			<!--begin::Container-->
			<div class=" container ">
				<div class="row">
		<div class="col-lg-12">
			<!--begin::Card-->
			<div class="card card-custom gutter-b example example-compact">
				<div class="card-header">
					<h3 class="card-title">
						User form
					</h3>
					<div class="card-toolbar">
						<div class="example-tools justify-content-center">
							<span class="example-copy" data-toggle="tooltip"></span>
						</div>
					</div>
				</div>
				<!--begin::Form-->
				<?php
									// echo "vend";
									// echo $vendor_code;
									// echo $grace_end_date;
									// echo  $sub_end_Date;
									echo $sub_start_date;

									
								
								?>
				<form method ="post" class="form">
					<div class="card-body">
						<div class="form-group row">
							<div class="col-lg-6">
								<label>add grace period:</label>
								<input type="text"  name="no_of_days" class="form-control" placeholder="no of days"/>
								<input type="hidden" value="<?php echo $vendor_code; ?>" name="vendor_code" class="form-control" placeholder="no of days"/>
								
							</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-6">
								<label>Amount for grace period:</label>
								<div class="input-group">
									<input type="text"  name="amount" class="form-control" placeholder="amount"/>
									<div class="input-group-append"><span class="input-group-text"><i class="la la-map-marker"></i></span></div>
								</div>
								
							</div>
							
						</div>
					

						<!-- begin: Example Code-->
						<div class="example-code mt-10">
							<ul class="example-nav nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-2x">
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#example_code_html" >HTML</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="example_code_html" role="tabpanel">
									<div class="example-highlight"><pre style="height:400px"><code class="language-html">
									&lt;form class=&quot;form&quot;&gt;
										&lt;div class=&quot;card-body&quot;&gt;
											&lt;div class=&quot;form-group row&quot;&gt;
												&lt;div class=&quot;col-lg-6&quot;&gt;
													&lt;label&gt;Full Name:&lt;/label&gt;
													&lt;input type=&quot;email&quot; class=&quot;form-control&quot; placeholder=&quot;Enter full name&quot;/&gt;
													&lt;span class=&quot;form-text text-muted&quot;&gt;Please enter your full name&lt;/span&gt;
												&lt;/div&gt;
												&lt;div class=&quot;col-lg-6&quot;&gt;
													&lt;label&gt;Contact Number:&lt;/label&gt;
													&lt;input type=&quot;email&quot; class=&quot;form-control&quot; placeholder=&quot;Enter contact number&quot;/&gt;
													&lt;span class=&quot;form-text text-muted&quot;&gt;Please enter your contact number&lt;/span&gt;
												&lt;/div&gt;
											&lt;/div&gt;
											&lt;div class=&quot;form-group row&quot;&gt;
												&lt;div class=&quot;col-lg-6&quot;&gt;
													&lt;label&gt;Address:&lt;/label&gt;
													&lt;div class=&quot;input-group&quot;&gt;
														&lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Enter your address&quot;/&gt;
														&lt;div class=&quot;input-group-append&quot;&gt;&lt;span class=&quot;input-group-text&quot;&gt;&lt;i class=&quot;la la-map-marker&quot;&gt;&lt;/i&gt;&lt;/span&gt;&lt;/div&gt;
													&lt;/div&gt;
													&lt;span class=&quot;form-text text-muted&quot;&gt;Please enter your address&lt;/span&gt;
												&lt;/div&gt;
												&lt;div class=&quot;col-lg-6&quot;&gt;
													&lt;label&gt;Postcode:&lt;/label&gt;
													&lt;div class=&quot;input-group&quot;&gt;
														&lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Enter your postcode&quot;/&gt;
														&lt;div class=&quot;input-group-append&quot;&gt;&lt;span class=&quot;input-group-text&quot;&gt;&lt;i class=&quot;la la-bookmark-o&quot;&gt;&lt;/i&gt;&lt;/span&gt;&lt;/div&gt;
													&lt;/div&gt;
													&lt;span class=&quot;form-text text-muted&quot;&gt;Please enter your postcode&lt;/span&gt;
												&lt;/div&gt;
											&lt;/div&gt;
											&lt;div class=&quot;form-group row&quot;&gt;
												&lt;div class=&quot;col-lg-6&quot;&gt;
													&lt;label&gt;User Group:&lt;/label&gt;
													&lt;div class=&quot;radio-inline&quot;&gt;
														&lt;label class=&quot;radio radio-solid&quot;&gt;
															&lt;input type=&quot;radio&quot; name=&quot;example_2&quot; checked=&quot;checked&quot; value=&quot;2&quot;/&gt;
															&lt;span&gt;&lt;/span&gt;
															Sales Person
														&lt;/label&gt;
														&lt;label class=&quot;radio radio-solid&quot;&gt;
															&lt;input type=&quot;radio&quot; name=&quot;example_2&quot; value=&quot;2&quot;/&gt;
															&lt;span&gt;&lt;/span&gt;
															Customer
														&lt;/label&gt;
													&lt;/div&gt;
													&lt;span class=&quot;form-text text-muted&quot;&gt;Please select user group&lt;/span&gt;
												&lt;/div&gt;
											&lt;/div&gt;
										&lt;/div&gt;
										&lt;div class=&quot;card-footer&quot;&gt;
											&lt;div class=&quot;row&quot;&gt;
												&lt;div class=&quot;col-lg-6&quot;&gt;
													&lt;button type=&quot;reset&quot; class=&quot;btn btn-primary mr-2&quot;&gt;Save&lt;/button&gt;
													&lt;button type=&quot;reset&quot; class=&quot;btn btn-secondary&quot;&gt;Cancel&lt;/button&gt;
												&lt;/div&gt;
												&lt;div class=&quot;col-lg-6 text-right&quot;&gt;
													&lt;button type=&quot;reset&quot; class=&quot;btn btn-danger&quot;&gt;Delete&lt;/button&gt;
												&lt;/div&gt;
											&lt;/div&gt;
										&lt;/div&gt;
									&lt;/form&gt;
									</code></pre></div>							</div>
							</div>
						</div>
						<!-- end: Example Code-->
					</div>
					<div class="card-footer">
						<div class="row">
							<div class="col-lg-6">
								<!-- <button type="reset" class="btn btn-primary mr-2">Save</button>
								<button type="reset" class="btn btn-secondary">Cancel</button> -->
							</div>
							<div class="col-lg-6 text-right">
								<button type="submit"  name="Grace_period"  class="btn btn-primary">add grace period</button>
							</div>
						</div>
					</div>
				</form>
				<!--end::Form-->
			</div>
			<!--end::Card-->

			<!--begin::Card-->

			<!--end::Card-->

			<!--begin::Card-->

			<!--end::Card-->

			<!--begin::Card-->

			<!--end::Card-->
		</div>
	</div>
			</div>
			<!--end::Container-->
			
		</div>
		<!--end::Entry-->
		
		

		



					</div>
					<!--end::Content-->




	<!--begin::Footer-->
	<div class="footer bg-white py-4 d-flex flex-lg-column " id="kt_footer">
		<!--begin::Container-->
		<div class=" container-fluid  d-flex flex-column flex-md-row align-items-center justify-content-between">
			<!--begin::Copyright-->
			<div class="text-dark order-2 order-md-1">
			<span class="text-muted font-weight-bold mr-2">2022&copy;</span>
			<a href="" target="_blank" class="text-dark-75 text-hover-primary">Seguro</a>
			</div>
			<!--end::Copyright-->

			<!--begin::Nav-->
			<div class="nav nav-dark">
				<a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-5">About</a>
				<a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-5">Team</a>
				<a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-0">Contact</a>
			</div>
			<!--end::Nav-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Footer-->
								</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
	<!--end::Main-->




	<!-- singout panel **************************************************************************************** -->
								<!-- begin::User Panel-->
	<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
		<!--begin::Header-->
		<div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
			<h3 class="font-weight-bold m-0">
				 Admin Profile
				<small class="text-muted font-size-sm ml-2"></small>
			</h3>
			<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
				<i class="ki ki-close icon-xs text-muted"></i>
			</a>
		</div>
		<!--end::Header-->

		<!--begin::Content-->
		<div class="offcanvas-content pr-5 mr-n5">
			<!--begin::Header-->
			<div class="d-flex align-items-center mt-5">
				<div class="symbol symbol-100 mr-5">
					<div class="symbol-label" style="background-image:url('dist/assets/media/users/300_21.jpg')"></div>
					<i class="symbol-badge bg-success"></i>
				</div>
				<div class="d-flex flex-column">
					<a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
						Admin
					</a>
					<!-- <div class="text-muted mt-1">
						Application Developer
					</div> -->
					<div class="navi mt-2">
						<a href="#" class="navi-item">
							<span class="navi-link p-0 pb-2">
								<span class="navi-icon mr-1">
									<span class="svg-icon svg-icon-lg svg-icon-primary"><!--begin::Svg Icon | path:dist/assets/media/svg/icons/Communication/Mail-notification.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
			<rect x="0" y="0" width="24" height="24"/>
			<path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"/>
			<circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5"/>
		</g>
	</svg><!--end::Svg Icon--></span>							</span>
								<span class="navi-text text-muted text-hover-primary"><?php echo $row_admin["registered_email"]?></span>
							</span>
						</a>

						<a href="logout.php?logout"   class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Sign Out</a>
						<!-- <script>var logout_link= document.getElementById("logout");
						logout_link.addEventListener("click",function(event){
							window.location.href = 'logout.php?logout'
						})
						</script> -->
					</div>
				</div>
			</div>
			<!--end::Header-->

			<!--begin::Separator-->
			<div class="separator separator-dashed mt-8 mb-5"></div>
			<!--end::Separator-->

			<!--begin::Nav-->
			<div class="navi navi-spacer-x-0 p-0">
				<!--begin::Item-->
				
				<!--end:Item-->

				<!--begin::Item-->
				
				<!--end:Item-->

				<!--begin::Item-->
			
				<!--end:Item-->

				<!--begin::Item-->
			
				<!--end:Item-->
			</div>
			<!--end::Nav-->

			<!--begin::Separator-->
			<div class="separator separator-dashed my-7"></div>
			<!--end::Separator-->

			<!--begin::Notifications-->
			
			<!--end::Notifications-->
		</div>
		<!--end::Content-->
	</div>
	<!-- end::User Panel-->
	<!-- singout panel **************************************************************************************** -->


	<!--begin::Quick Cart-->

	<!--end::Quick Cart-->

								<!--begin::Quick Panel-->

	<!--end::Quick Panel-->

								<!--begin::Chat Panel-->
	<div class="modal modal-sticky modal-sticky-bottom-right" id="kt_chat_modal" role="dialog" data-backdrop="false">
	
	<!--end::Chat Panel-->

								<!--begin::Scrolltop-->
	<div id="kt_scrolltop" class="scrolltop">
		<span class="svg-icon"><!--begin::Svg Icon | path:dist/assets/media/svg/icons/Navigation/Up-2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
			<polygon points="0 0 24 0 24 24 0 24"/>
			<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1"/>
			<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero"/>
		</g>
	</svg><!--end::Svg Icon--></span></div>
	<!--end::Scrolltop-->

								<!--begin::Sticky Toolbar-->

	<!--end::Sticky Toolbar-->
					<!--begin::Demo Panel-->
	<div id="kt_demo_panel" class="offcanvas offcanvas-right p-10">
		<!--begin::Header-->
		<div class="offcanvas-header d-flex align-items-center justify-content-between pb-7">
			<h4 class="font-weight-bold m-0">
				Select A Demo
			</h4>
			<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_demo_panel_close">
				<i class="ki ki-close icon-xs text-muted"></i>
			</a>
		</div>
		<!--end::Header-->

		<!--begin::Content-->
		<div class="offcanvas-content">
			<!--begin::Wrapper-->
		
			<!--end::Wrapper-->

			<!--begin::Purchase-->
			<div class="offcanvas-footer">
				<a href="https://1.envato.market/EA4JP" target="_blank" class="btn btn-block btn-danger btn-shadow font-weight-bolder text-uppercase">
					Buy Metronic Now!
				</a>
			</div>
			<!--end::Purchase-->
		</div>
		<!--end::Content-->
	</div>
	<!--end::Demo Panel-->

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


				</body>
		<!--end::Body-->
	</html>