<?php 
  session_start();
  include("includes/connect.php"); 
  if($_SESSION['username'] == true){
    $rollno = $_SESSION['username'];
  }
  $id = $_GET['ID'];
  $query = "SELECT * FROM addbook INNER JOIN user ON user.RollNo = addbook.RollNo WHERE BookId = '$id'";
  $query_run = mysqli_query($conn,$query);
  if($query_run){
    if (mysqli_num_rows($query_run) > 0) {
      $req = "REQ";
      $query1 = "UPDATE addbook SET BuyStatus = '$req' , Buyer = '$rollno' WHERE BookId = '$id'";
      $query1_run = mysqli_query($conn, $query1);
      if($query1_run){
        $row = mysqli_fetch_assoc($query_run);
        $query2 = "SELECT * FROM user WHERE RollNo = '$rollno'";
        $query2_run = mysqli_query($conn,$query2);
        $row2 = mysqli_fetch_assoc($query2_run);
        require("PHPMailer/src/PHPMailer.php");
        require("PHPMailer/src/SMTP.php");
        require("PHPMailer/src/Exception.php");
        if($query2_run)
        {
          //     ==================> E-mail to Seller <==================
          $s_to = $row["Email"];
          $mail = new PHPMailer\PHPMailer\PHPMailer(true);
          $mail->setFrom('admin@example.com');
          $mail->addAddress($s_to);
          $mail->Subject = " ". $row2["FN"]. "  " . $row2["LN"]. " has send a request on Dream Pustak.";
          $mail->Body =  "Hi " . $row["FN"]. ",\n
" . $row2["FN"]. "  " . $row2["LN"]. " has send a request to buy a book named as " . $row["BookName"]. " on Dream Pustak.\n
You can contact with " . $row2["FN"]. " using following details and update respective status on Dream Pustak.
Name: " . $row2["FN"]. "  " . $row2["LN"]. "
Roll No.: " . $row2["RollNo"]. "
Email: " . $row2["Email"]. "
Contact: " . $row2["ContactNo"]. " \n
Regard,
Books4U";
          $mail->IsSMTP();
          $mail->SMTPSecure = 'ssl';
          $mail->Host = 'ssl://smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Port = 465;
          $mail->Username = 'omkarpatil.demo@gmail.com';
          $mail->Password = 'omkarpatildemo@123';
          $s_mail_query = $mail->send();


          //     ==================> E-mail to Buyer <==================


          $b_to = $row2["Email"];
          $mail = new PHPMailer\PHPMailer\PHPMailer(true);
          $mail->setFrom('admin@example.com');
          $mail->addAddress($b_to);
          $mail->Subject = "Request has been sent to " . $row["FN"]. "  " . $row["LN"]. " on Dream Pustak";
          $mail->Body =  "Hi " . $row2["FN"]. ",\n
Your request for book on Dream Pustak named as " . $row["BookName"]. " has been sent to " . $row["FN"]. " " . $row["LN"]. " on Dream Pustak.\n
You can contact with " . $row["FN"]. " using following details.
Name: " . $row["FN"]. "  " . $row["LN"]. "
Roll No.: " . $row["RollNo"]. "
Email: " . $row["Email"]. "
Contact: " . $row["ContactNo"]. " \n
Regard,
Dream Pustak";
          $mail->IsSMTP();
          $mail->SMTPSecure = 'ssl';
          $mail->Host = 'ssl://smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Port = 465;
          $mail->Username = 'omkarpatil.demo@gmail.com';
          $mail->Password = 'omkarpatildemo@123';
          $b_mail_query = $mail->send();
          if($s_mail_query || $b_mail_query)
          {
            echo "<script type='text/javascript'>alert('Request has been sent!!!');window.location='yourrequests.php';</script>";
          }
          else{
            echo "<script type='text/javascript'>alert('Request sending failed...');window.location='yourrequests.php';</script>";
          }
        }
      }
    }
  }
  else{
    echo mysqli_error($conn);
  }
?>