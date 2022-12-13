

<?php
include("config.php");
include("mail.php");
if(isset($_POST['email'])){
$email=$_POST['email'];
$connect=mysqli_query($connection,"SELECT * FROM student WHERE email LIKE '%$email%'");
$count=mysqli_num_rows($connect);
if($count!=0){
  while($row=mysqli_fetch_array($connect)){
    $id=$row['id'];
    echo($id);
  //----------------



try{
      $code= rand(1231,7879);

      $sql=mysqli_query($connection,"UPDATE student SET code='$code' WHERE id=$id");

        $mail->setFrom('mejoas67@gmail.com', 'Amjad AL-amri');
        $mail->addAddress($_POST['email']);
        $mail->Subject = 'كود التحقق';
        $mail->Body = 'رمز التحقق <b>'.$code.'</b> ';
        $mail->send();

        echo "Mail has been sent successfully!";

  }




  catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }

  //-----------

?>
<script language="javascript">window.location.href="ver.php?v=<?php echo $row['id'];?>";</script>

<?php

  }
}
  //----------------






//---
else{
  echo("<div class='d1'>لايوجد بريد مسجل حاول مرة أخرى</div>");
}}
?>
<html>
 <head>
   <title>Forgetpass page</title>
     <link rel="stylesheet" href="design.css">
 </head>
 <body>
      <div class="d1">

 <form action="" method=POST>
<h1 style="color:black;">التحقق من البريد الالكتروني</h1>

 <input type="email" name="email" id="email" placeholder="أدخل بريدك الكتروني">
     <br><br>


     <br><br>
       <input type="submit" class="s" name="sub1" id="sub1" value=" تحقق ">
 </form>
</div>
</body>
 </html>