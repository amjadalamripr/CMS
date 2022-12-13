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

<h3 > عضوية جديدة</h3>
  <h4 >أدخل بيانات العضوية</h4>

  <?php
  if(isset($_GET['errorm'])&&!empty($_GET['errorm'])){
    ?>
    <div style='color:red;'>اسم المستخدم موجود من قبل</div>
    <?php
  }
  if(isset($_GET['errorm2'])&&!empty($_GET['errorm2'])){
  echo("<div style='color:red;'>يجب أن تتطابق كلمة السر </div>");
}



if(isset($_GET['r'])&&!empty($_GET['r'])){
echo("<div style='color:red;'>يوجد بريد مسجل بالفعل  </div>");
}


if(isset($_GET['re'])&&!empty($_GET['re'])){
echo("<div style='color:red;'>يوجد مستخدم بنفس الاسم استخدم اسم اخر </div>");
}
  ?>



  <form action="dashboardus.php" method=POST>
    <input type="text"  name="user" id="user" placeholder="اسم المستخدم " required="require">
    <br><br>
    <input type="text"  name="name" id="name" placeholder="الاسم " required="require">
    <br><br>
      <input type="password" name="pass" id="pass" placeholder="كلمة المرور "required="require">
      <br><br>

      <input type="password" name="passv" id="passv" placeholder="تأكيد كلمة المرور "required="require">

      <br><br>

      <input type="email" name="email" id="email" placeholder="أدخل بريدك الكتروني"required="require">



      <br><br>


 <input type="submit" class="s" name="sub" id="sub" value="تسجيل جديد " >
 <br> <br>
 <span> <u> <a class="for" href="https://amjadwebsite2022.online/" >لديك حساب  أضغط هنا  </a></u></span>


  </form>
  </div>

  </body>
</html>
