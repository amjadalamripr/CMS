<?php
if(!isset($_SESSION)) { session_start(); }
include("config.php");
include("function.php");



if(!isset($_SESSION['admin_role'] )){
$user=input_secure($_POST['user']);
$name=input_secure($_POST['name']);
$pass=input_secure($_POST['pass']);
$passv=input_secure($_POST['passv']);
$ecrp_pass=sha1(md5($pass));
$ecrp_passv=sha1(md5($passv));
$email=input_secure($_POST['email']);
$connect=mysqli_query($connection,"SELECT * FROM student WHERE email LIKE '%$email%'");
$connec=mysqli_query($connection,"SELECT * FROM student WHERE username LIKE '%$user%'");


$count=mysqli_num_rows($connect);
if($count>0){

  ?>
  <script language="javascript">window.location.href="homepageuser.php?r=1";</script>
  <?php
}
//----------------------
$coun=mysqli_num_rows($connec);
if($coun>0){

  ?>
  <script language="javascript">window.location.href="homepageuser.php?re=1";</script>
  <?php
}
//---------
if ($ecrp_pass == $ecrp_passv) {

  $sql=mysqli_query($connection,"INSERT INTO `student`(`username`, `password`, `email`,   `name`, `passwordv`)
   VALUES ('$user','$ecrp_pass','$email','$name','$ecrp_pass')");
   $_SESSION['admin_role']=$name;
   ?>
   <script language="javascript">window.location.href="https://amjadwebsite2022.online/";</script>
<?php



}


  else{

    ?>

    <script language="javascript">window.location.href="homepageuser.php?errorm2=1";</script>


  <?php


}

}




else{

$namepage=array("لوحة التحكم");
include("header0.php");
// ?>
<div class="column2">

  <?php echo("  <h3'style=color:black;'>  أهلاً"." ". $_SESSION['admin_role']."  </h3>");
  ?>
  <p>تُسعدنا زيارتك لموقع تأهيل تك والذي يتميزبعرض أهم المقالات والصور والفيدوهات الحديثة في عالم البرمجة نتمنى لك  رحلة سعيدة في موقعنا
  والتعلم أكثر </p>

  <h2>لا تنتظر كثير وابدأ رحلتك يا رهيب </h2>
</div>


  <?php

include("foteer.php");
}
//injection for code
//1'OR'x'='x
?>
