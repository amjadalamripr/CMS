<?php
session_start();
if(isset( $_SESSION['admin_role'])){
$namepage=array("لوحة التحكم",
"إدارة المقالات",
"بحث عن مقال");
include("header0.php");
include("config.php");
include("function.php");
 ?>
 <html>
 <head>
  <title>Serach  page</title>
<link rel="stylesheet" href="design.css">
</head>
 <body>
<div class="column2" >
  <h1> عناوين المقالات </h1>
<?php
    $id=$_GET['d'];
    $connect=mysqli_query($connection,"SELECT * FROM article WHERE type =$id");
    $count=mysqli_num_rows($connect);
    if($count!=0){
      while($row=mysqli_fetch_array($connect)){
      //-----------------------------------------------------


        ?>

        <a style="color:black;" href='articalvi.php?vi=<?php echo $row['id'];?>' >
          <?php

           echo($row['article_name']);



?>
<br><br>
       <img name="tit" style="width: 200px;height: 200px;" src='<?php echo ("https://amjadwebsite2022.online/admin/".$row['article_img']);?> '></a>
      <?php
      $current_count=$row['count'];
      $new_count=$current_count+1;
      $update=mysqli_query($connection,"UPDATE `article` SET `count`=$new_count  WHERE vaild=1 AND id=$id ");
      echo("<p style='color:#62A511;'>".$new_count." مشاهدة</p>");
      ?>
       <br><br>

<?php

     }
}


    else{
echo("Sorry there is no data try again");
}

echo ("</div>");?>
</body>
</html>
<?php

include("foteer.php");
}
else
{?>
  <script language="javascript">window.location.href="homepageuser.php?errorm=1";</script>
<?php
}
?>




<!-- echo("<br><br>");
  echo"<table id='customers'>
    <th>الاسم</th>
    <th>المقال</th>
    <th>نوع الاشتراك</th>
    <th>نوع المحتوى</th>
    <th>تعديل</th>
    <th>حذف</th>";
  while($ro=mysqli_fetch_array($connect)){
       echo("<tr>");
       echo("<td>".$ro['article_name']."</td>");
       echo("<td>".$ro['article_img']."</td>") ;
        echo("<td>");
       if($ro['vaild']==1){

         echo("فعال");
       }
         else
         {
           echo("محظور");
         }
          echo("</td>");

       echo("<td>");
      switch ($ro['type']) {
            case '3':
            echo"مقال";
            break;
            case '2':
            echo"فيديو";
            break;
            case '1':
            echo"صورة";
            break;
        default:
          // code...
          break;
        }
         echo("</td>");


         ?>


    <td><a class="ab" href="articaledit.php?up=<?php// echo $ro['id'];?>">تعديل</a></td>
    <td><a class="abc" href="article.php?del=<?php// echo $ro['id'];?>">X</a></td>
<?php

//}
