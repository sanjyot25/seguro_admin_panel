<?php 
	session_start();
	//accessing cookie values(*****) 
	// $user_name_cookie= $_COOKIE["username_cookie"];
	//accessing cookie values(*****) 
	include_once 'database_connection.php';
    

	// $query = "SELECT * FROM api ";
	// $result = mysqli_query($query,$conn);
    

	// $res = $conn->prepare("SELECT * FROM cart ORDER BY DESC");
	// $res->execute();
	// $result = $res->get_result();
	// $row = $result->fetch_assoc();

    $res = $conn->prepare("SELECT * FROM api");
    $res->execute();
    $result = $res->get_result();
    $row = $result->fetch_assoc();
   

    $sub_start_Date = $row['sub_start_date'];
    $sub_end_Date = $row['sub_end_date'];
    // $grace_start = $row['grace_start_date'];
    // $grace_end = $row['grace_end_date'];

    //subscription remaining days
    $sub_start_date=date_create($sub_start_Date);
    $sub_end_date=date_create($sub_end_Date);
    $sub_diff=date_diff( $sub_start_date,$sub_end_date);
    $sub_ends_in=$sub_diff->format("%a");
    echo $sub_ends_in;

    //grace days
    // $grace_start_date=date_create( $grace_start);
    // $grace_end_date=date_create($grace_end );
    // $grace_diff=date_diff( $grace_start_date,$grace_end_date);
    // echo $grace_diff->format("%a ");
   

    // $sum_of_days =  $sub_diff->format("%a") + $grace_diff->format("%a");
    // echo  $sum_of_days;


    // $Days=" days";
    // $sum_of_days=$sum_of_days.$Days;
    // echo $sum_of_days;
    // $Date = $sub_end_Date;
    // echo date('Y-m-d', strtotime($Date.  '+ 10 days'));


    //*************--------calculating grace end date---------**************//
    $today = date("Y-m-d");
    // echo  $today;

    $number_of_days = 10;
    $grace_end = date('Y-m-d', strtotime($today. "+ $number_of_days days"));

    // echo date('Y-m-d', strtotime($today. "+ $number_of_days days"));
    echo "grace end::";
    echo $grace_end;


    //calculating final date
    $final_end = date('Y-m-d', strtotime($grace_end. "+ $sub_ends_in days + 1 days"));
    echo "final end::";
    echo $final_end;
    

    
  
    // $end_date = $conn-> prepare('UPDATE api SET final_end = ? Where id="sanjyot" ');
    // $end_date->bind_param('s', $final_end);
    // $end_date->execute();
        

//************************** checking subscription has ended or not *****************/
    // if( $today== $sub_end_Date  ){
    //     echo "sub has ended";
    //     $end_date = $conn-> prepare('UPDATE subscription SET sub_status=2 Where vendor_code="sanjyot" ');
    //     // $end_date->bind_param('s', $final_end);
    //     $end_date->execute();
 
    // }else if($today > $sub_end_Date){
    //     echo "sub has ended";
    //     $end_date = $conn-> prepare('UPDATE subscription SET sub_status=2 Where vendor_code="sanjyot" ');
    //     // $end_date->bind_param('s', $final_end);
    //     $end_date->execute();
    // }
    // else{
    //     echo "sub has not ended";
    //     $end_date = $conn-> prepare('UPDATE subscription SET sub_status=1 Where vendor_code="sanjyot" ');
    //     // $end_date->bind_param('s', $final_end);
    //     $end_date->execute();
    // }




        //************** applying and checking grace period */

    //     // subscription has ended and grace period starts on same day
    if ($today == $sub_end_Date){

    echo "inside";

    $grace_end_date = $conn-> prepare('UPDATE api SET grace_end_date = ? , final_end = ? Where vendor_code="sanjyot" ');
    $grace_end_date->bind_param('ss',$grace_end, $final_end);
    $grace_end_date->execute();

    echo "out";

           $update_grace_status = $conn-> prepare('UPDATE grace_period SET grace_status=1 Where vendor_code="sanjyot" ');
           $update_grace_status->bind_param('s', $final_end);
           $update_grace_status->execute();

        if($today == $final_end){
            $update_grace_status = $conn-> prepare('UPDATE grace_period SET grace_status=2 Where vendor_code="sanjyot" ');
           $update_grace_status->bind_param('s', $final_end);
           $update_grace_status->execute();
        }

    }





        //subscription has not ended and grace period starts before the subscription ends
//     if ($today < $sub_end_Date){

//     // $grace_end_date = $conn-> prepare('UPDATE api SET grace_end_date = '.$grace_end.' AND final_date = '.$final_end.' Where vendor_code="sanjyot" ');
//     // $grace_end_date->bind_param('s', $final_end);
//     // $grace_end_date->execute();

   

//    //         $update_grace_status = $conn-> prepare('UPDATE grace_period SET sub_status=1 Where vendor_code="sanjyot" ');
//     //        $update_grace_status->bind_param('s', $final_end);
//     //        $update_grace_status->execute();

           // if($today == $final_end){
    //         $update_grace_status = $conn-> prepare('UPDATE grace_period SET sub_status=2 Where vendor_code="sanjyot" ');
    //        $update_grace_status->bind_param('s', $final_end);
    //        $update_grace_status->execute();
        // }

//     }


        //subscription has not ended and grace period starts before the subscription ends
//     if ($today > $sub_end_Date){

//     // $grace_end_date = $conn-> prepare('UPDATE api SET grace_end_date = '.$grace_end.' AND final_date = '.$final_end.' Where vendor_code="sanjyot" ');
//     // $grace_end_date->bind_param('s', $final_end);
//     // $grace_end_date->execute();

   

//    //         $update_grace_status = $conn-> prepare('UPDATE grace_period SET sub_status=1 Where vendor_code="sanjyot" ');
//     //        $update_grace_status->bind_param('s', $final_end);
//     //        $update_grace_status->execute();

           // if($today == $final_end){
    //         $update_grace_status = $conn-> prepare('UPDATE grace_period SET sub_status=2 Where vendor_code="sanjyot" ');
    //        $update_grace_status->bind_param('s', $final_end);
    //        $update_grace_status->execute();
        // }

//     }




	?>
