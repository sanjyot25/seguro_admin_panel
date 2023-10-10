    <?php
    include_once ("database_connection.php");
    require 'vendor/autoload.php';
    echo '<script>alert("connected")</script>';

    use PHPMailer\PHPMailer\PHPMailer;
 
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    $mail = new PHPMailer(true);
    echo '<script>alert("if bhayr")</script>';

   



    $today = date("Y-m-d",strtotime($today. "+ 0 days"));

    $first_email = date("Y-m-d",strtotime($today. "+ 15 days"));

    $second_email = date("Y-m-d",strtotime($today. "+ 2 days"));



    $api_data = $conn->prepare("SELECT * FROM api");
    $api_data->execute();
    $result = $api_data->get_result();
    //$row = $result->fetch_assoc();


    while($row = $result->fetch_assoc()){

        $vendor_code = $row['vendor_code'];
        $final_end_date = $row['final_end'];
        echo "<script>alert('$vendor_code')</script>";

        $email_fetch = $conn->prepare("SELECT * FROM vendor_registration  Where vendor_code=? ");
        $email_fetch->bind_param('s',   $vendor_code);
        $api_data->execute();
        $email_fetch = $admin_fetch->get_result();
        $row_email = $email_fetch->fetch_assoc();
        $email = $row['vendor_email'];
       


      



    if($first_email == $final_end_date){
        echo '<script>alert("first mail")</script>';
        echo "<script>alert('$final_end_date')</script>";

        $output.='<p>Dear user,</p>';
        $output.='<p>Your subscription is about to end in next 2 days.</p>';
        $output.='<p>Please Consider renewing you subscription.</p>';
        $output.='<p>Thanks,</p>';
        $output.='<p>Seguro Team</p>';
        $body = $output;
        $subject = "Seguro Subscription renewal reminder - seguro.in";

    try
    {  
        echo '<script>alert("inside try")</script>';

      //Recipients
        
      $mail->isSMTP();											
      $mail->Host	 = 'smtp.gmail.com;';					
      $mail->SMTPAuth = true;							
      $mail->Username = 'sanjyotvelip25@gmail.com';				
      $mail->Password = 'qeefwzuhfxkrmumf';						
      $mail->SMTPSecure = 'tls';							
      $mail->Port	 = 587;  
      $mail->setFrom('sanjyotvelip25@gmail.com', 'seguro subscription ending alert');
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



   
      
      // echo '<script>alert("mail after send")</script>';
      ?><script>alert('An email has been sent to you with instructions on how to reset your password.');</script><?php
    }
    catch (Exception $e)
    {
      ?><script>alert('uncaught error');</script><?php
    }


    }

    


    if($second_email == $final_end_date){
        // echo '<script>alert("second mail")</script>';
        // echo '<script>alert(" email sent to seguro@1247")</script>';
        // echo "<script>alert('$final_end_date')</script>";

        $output.='<p>Dear user,</p>';
        $output.='<p>Your subscription is about to end in next 2 days.</p>';
        $output.='<p>Please Consider renewing you subscription.</p>';
        $output.='<p>Thanks,</p>';
        $output.='<p>Seguro Team</p>';
        $body = $output;
        $subject = "Seguro Subscription renewal reminder - seguro.in";

    try
    {  
        echo '<script>alert("inside try")</script>';

        
       
      //Recipients
        
      $mail->isSMTP();											
      $mail->Host	 = 'smtp.gmail.com;';					
      $mail->SMTPAuth = true;							
      $mail->Username = 'sanjyotvelip25@gmail.com';				
      $mail->Password = 'q1w2e#r4';						
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
      ?><script>alert('An email has been sent to you with instructions on how to reset your password.');</script><?php
    }
    catch (Exception $e)
    {
      ?><script>alert('uncaught error');</script><?php
    }


    }
    echo '<script>alert("if bhayr")</script>';
  

  }







    ?>