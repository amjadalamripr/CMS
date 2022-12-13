<?php
if(!isset($_SESSION)) { session_start(); }
include("config.php");
include("function.php");
?>
<html>
  <head>
      <title>Home page</title>
        <link rel="stylesheet" href="design.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@300&family=Noto+Naskh+Arabic:wght@700&family=Noto+Sans+Arabic:wght@300&display=swap" rel="stylesheet">
  </head>
  <body>
  <div class="d1">
<img src="logo.png" alt="logo" width="20%" height="20%">
<?php

if(isset($_GET['errorms'])&&!empty($_GET['errorms'])){
  ?>
  <div>اسم المستخدم أو كلمة المرور خطا</div>
  <?php
}
 ?>
<h3 >تسجيل الدخول</h3>
  <h4 >أدخل بيانات العضوية</h4>
  <form action="dashboard.php" method=POST>
    <input type="text"  name="user" id="user" placeholder="اسم المستخدم ">
    <br><br>
      <input type="password" name="pass" id="pass" placeholder="كلمة المرور ">
      <?php

      ?>
      <br><br>




    <span>  <a class="for" href="emailforget.php" >هل نسيت كلمة المرور أضغط هنا</a><br><br></span>
    <span> <u> <a class="for" href="user/homepageuser.php" >مستخدم جديد أضغط هنا </a></u></span>

      <br><br>


 <input type="submit" class="s" name="sub" id="sub" value=" تسجيل الدخول " >


  </form>
  </div>

  </body>
</html>
