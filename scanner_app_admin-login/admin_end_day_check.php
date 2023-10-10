    <?php
    include_once ("database_connection.php");
  
    echo '<script>alert("connected")</script>';

   

   



    $today = date("Y-m-d",strtotime($today. "+ 0 days"));





    $api_data = $conn->prepare("SELECT * FROM api");
    $api_data->execute();
    $result = $api_data->get_result();
    //$row = $result->fetch_assoc();


    while($row = $result->fetch_assoc()){

        $vendor_code = $row['vendor_code'];
        $final_end_date = $row['final_end'];
        $payment_status = $row['payment_status'];
        $grace_id = $row['grace_id'];
        $sub_id = $row['sub_id'];

        echo "<script>alert('$vendor_code')</script>";

        if($payment_status == '1'){

          if($sub_status == '1' && $grace_status == '1'){
            // echo '<script>alert("vendor already has active grace period")</script>';
            //header('location: view_registered_vendors.php');
            if($final_end_date==$today){

              $update_status = $conn-> prepare('UPDATE api SET 	payment_status=2,grace_status=3,subscription_status=2 Where vendor_code = ? AND grace_id = ? ');
              $update_status->bind_param('ss', $vendor_code,$grace_id);
              $update_status->execute();

              //grace table update status 2 or 3
              $update_grace_status = $conn-> prepare('UPDATE admin_grace_period SET grace_status=3 Where vendor_code = ? AND grace_id = ? ');
              $update_grace_status->bind_param('ss', $vendor_code,$grace_id);
              $update_grace_status->execute();

              //update subscription status in vendor_subscription 
              $update_subscription_status = $conn-> prepare('UPDATE vendor_subscription SET subscription_status=2 Where vendor_code = ? AND subscription_id=? ');
              $update_subscription_status->bind_param('ss', $vendor_code,$sub_id);
              $update_subscription_status->execute();
        
              }
          }
    
          if($sub_status == '2' && $grace_status == '1'){
            // echo '<script>alert("vendor already has active grace period")</script>';
            if($final_end_date==$today){

              $update_status = $conn-> prepare('UPDATE api SET 	payment_status=2,grace_status=3,subscription_status=2 Where vendor_code = ? AND grace_id = ? ');
              $update_status->bind_param('ss', $vendor_code,$grace_id);
              $update_status->execute();

              //grace table update status 2 or 3
              $update_grace_status = $conn-> prepare('UPDATE admin_grace_period SET grace_status=3 Where vendor_code = ? AND grace_id = ? ');
              $update_grace_status->bind_param('ss', $vendor_code,$grace_id);
              $update_grace_status->execute();

              //update subscription status in vendor_subscription 
              $update_subscription_status = $conn-> prepare('UPDATE vendor_subscription SET subscription_status=2 Where vendor_code = ? AND subscription_id=? ');
              $update_subscription_status->bind_param('ss', $vendor_code,$sub_id);
              $update_subscription_status->execute();
        
                }
          }
    
          if($sub_status == '1' && $grace_status == '2'){
            // echo '<script>alert("vendor already has active grace period")</script>';
            if($final_end_date==$today){

              $update_status = $conn-> prepare('UPDATE api SET 	payment_status=2,grace_status=2,subscription_status=2 Where vendor_code = ? AND grace_id = ? ');
              $update_status->bind_param('ss', $vendor_code,$grace_id);
              $update_status->execute();

              //grace table update status 2 or 3
              $update_grace_status = $conn-> prepare('UPDATE admin_grace_period SET grace_status=2 Where vendor_code = ? AND grace_id = ? ');
              $update_grace_status->bind_param('ss', $vendor_code,$grace_id);
              $update_grace_status->execute();

              //update subscription status in vendor_subscription 
              $update_subscription_status = $conn-> prepare('UPDATE vendor_subscription SET subscription_status=2 Where vendor_code = ? AND subscription_id=? ');
              $update_subscription_status->bind_param('ss', $vendor_code,$sub_id);
              $update_subscription_status->execute();
        
              }
          }

          if($sub_status == '1' && $grace_status == '0'){
            // echo '<script>alert("vendor already has active grace period")</script>';
            if($final_end_date==$today){

              $update_status = $conn-> prepare('UPDATE api SET 	payment_status=2,grace_status=0,subscription_status=2 Where vendor_code = ? AND grace_id = ? ');
              $update_status->bind_param('ss', $vendor_code,$grace_id);
              $update_status->execute();

              //grace table update status 2 or 3
              $update_grace_status = $conn-> prepare('UPDATE admin_grace_period SET grace_status=0 Where vendor_code = ? AND grace_id = ? ');
              $update_grace_status->bind_param('ss', $vendor_code,$grace_id);
              $update_grace_status->execute();

              //update subscription status in vendor_subscription 
              $update_subscription_status = $conn-> prepare('UPDATE vendor_subscription SET subscription_status=2 Where vendor_code = ? AND subscription_id=? ');
              $update_subscription_status->bind_param('ss', $vendor_code,$sub_id);
              $update_subscription_status->execute();
        
              }
          }
          if($sub_status == '0' && $grace_status == '1'){
            // echo '<script>alert("vendor already has active grace period")</script>';
            if($final_end_date==$today){

              $update_status = $conn-> prepare('UPDATE api SET 	payment_status=2,grace_status=3,subscription_status=0 Where vendor_code = ? AND grace_id = ? ');
              $update_status->bind_param('ss', $vendor_code,$grace_id);
              $update_status->execute();

              //grace table update status 2 or 3
              $update_grace_status = $conn-> prepare('UPDATE admin_grace_period SET grace_status=3 Where vendor_code = ? AND grace_id = ? ');
              $update_grace_status->bind_param('ss', $vendor_code,$grace_id);
              $update_grace_status->execute();

              //update subscription status in vendor_subscription 
              $update_subscription_status = $conn-> prepare('UPDATE vendor_subscription SET subscription_status=0 Where vendor_code = ? AND subscription_id=? ');
              $update_subscription_status->bind_param('ss', $vendor_code,$sub_id);
              $update_subscription_status->execute();
        
              }
          }

      
      }

    


      }

    







    ?>