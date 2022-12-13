
<html>

  <head>
      <!-- <title>header page</title> -->
        <link rel="stylesheet" href="design.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

      </head>
  <body>
    <!--right-->  <div class="column" >
         <ul>

        <li><img src="logo.png" alt="logo" style="vertical-align:middle;" width="60%" height="15%%"></li>
        <li class="hover"><a href="dashboardus.php">الرئيسة</a></li>
        <!-- <li class="hover"><a href="#">القائمة الرئيسة</a></li> -->
        <li class="hover"><a href="news0.php">التصنيفات</a></li>
        <li class="hover"><a href="article0.php">المقالات</a></li>
        <li class="hover"><a href="photo0.php">الصور</a></li>
        <li class="hover"><a href="video.php">الفيديو</a></li>
        <li class="hover"><a href="signout.php"> تسجيل الخروج</a>


         </ul>
  </div>
    <!--top-->    <div class="column3">
    <br>

    <span  class="font">

      الصفحة الرئيسة

    </span>&nbsp;	&nbsp;
    <span> <a class="fon" href ="#" >
       <?php foreach($namepage as $name){
        echo(" - ".$name);}?>
      </a></span>
   <hr>
   </div>
   </body>
   </html>
