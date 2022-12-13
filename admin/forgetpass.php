
<?php
include("config.php");
include("function.php");

$id=$_GET['v'];
if(isset($_POST['sub1'])){
  $pass=input_secure($_POST['pass']);
  $passv=input_secure($_POST['passv']);
  $ecrp_pass=sha1(md5($pass));
  $ecrp_passv=sha1(md5($passv));
  if ($ecrp_pass == $ecrp_passv) {

  $sql=mysqli_query($connection,"UPDATE `student` SET `password`='$ecrp_pass',`passwordv`='$ecrp_passv' WHERE id=$id");
  ?>
   <script language="javascript">window.location.href="homepage.php"</script>

   <?php

}

else{
  echo("<p class ='d1'>يجب أن تتطابق كلمة المرور مع تأكيد كلمة المرور
  </p>");
}
}

?>

 <html>
 <head>
   <title>Forgetpass page</title>
     <link rel="stylesheet" href="design.css">
 </head>
 <body>
      <div class="d1">
           <h1 style="color:black;">إعادة تعين يكلمة المرور</h1>
 <form action="" method=POST>


   <input type="password" name="pass" id="pass" placeholder="كلمة المرور الجديدة" >

   <br><br>
     <input type="password" name="passv" id="passv" placeholder="تأكيد كلمة المرورالجديدة ">
     <br><br>


     <br><br>
       <input type="submit" class="s" name="sub1" id="sub1" value=" تحديث ">
 </form>
</div>
</body>
 </html>