<?php
session_start();
  if(isset( $_SESSION['admin_role'])){
$namepage=array("لوحة التحكم",
"إدارة المقالات",
"عرض المقالات");
include("config.php");
include("function.php");
$id=$_GET['n'];
?>


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
        <li class="hover"><a href="dashboard.php">الرئيسة</a></li>

        <li class="hover"><a href="news.php">التصنيفات</a></li>
        <li class="hover"><a href="article.php">المقالات</a></li>
        <li class="hover"><a href="photo.php">الصور</a></li>
        <li class="hover"><a href="#">الفيديو</a></li>
        <li class="hover"><a href="signout.php"> تسجيل الخروج</a>


         </ul>
  </div>
    <!--top-->    <div class="column3">


    <span  class="font">
<br>
      الصفحة الرئيسة
   <hr>
    </span>&nbsp;	&nbsp;
    <span> <a class="fon" href ="article.php" >
       <?php foreach($namepage as $name){
        echo(" - ".$name);}?>
      </a></span>

   </div>
   </body>
   </html>


      <div class="column2">

        <?php



    $SQ_img=mysqli_query($connection," SELECT * FROM `article` WHERE vaild=1 AND id=$id ORDER BY article_name DESC");
      while($ro=mysqli_fetch_array($SQ_img)){
    //--------------------
    $current_count=$ro['count'];
    $new_count=$current_count+1;
    $update=mysqli_query($connection,"UPDATE `article` SET `count`=$new_count  WHERE vaild=1 AND id=$id ");









         echo("<h1>".$ro['article_name']."</h1>");?>



<h5>حُرر بتاريخ :
<?php   echo $ro['dateadd'];
        echo("<br><br>");
        ?>
      <a href='<?php echo($ro['article_img']);?>'> <img style="width: 200px;height: 200px; margin-right:10px;" src='<?php echo ($ro['article_img']);?> '></a>
            <?php
        echo("<br><br>");
       echo $ro['tex'];

?>
</h5>



</div>
<?php
}
include("foteer.php");
}
else{?>
  <script language="javascript">window.location.href="homepage.php?errorms=1";</script>
<?php
}
?>
