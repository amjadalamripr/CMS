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
<?php
if(isset($_POST['se'])){
    $search=$_POST['se'];
    $connect=mysqli_query($connection,"SELECT  article.*,categor.id as cat_id , categor.catname as CATname FROM article LEFT JOIN categor ON article.type=categor.id WHERE article.article_name  LIKE '%$search%' OR categor.catname LIKE '%$search%'");

    $count=mysqli_num_rows($connect);
    if($count!=0){
      echo("<br><br>");
      echo"<table id='customers'>
        <th>الاسم</th>
        <th>المقال</th>
        <th>نوع المحتوى</th>
          <th>نوع الاشتراك</th>
      ";

      while($ro=mysqli_fetch_array($connect)){
           echo("<tr>");
           echo("<td>".$ro['article_name']."</td>");
           echo("<td>".$ro['article_img']."</td>") ;

           echo("</td>");

           echo("<td>");

          echo($ro['CATname']) ;

           echo("</td>");

            echo("<td>");
           if($ro['vaild']==1){

             echo("فعال");
           }
             else
             {
               echo("محظور");
             }

          //  echo("<td>");
          // switch ($ro['type']) {
          //       case '3':
          //       echo"مقال";
          //       break;
          //       case '2':
          //       echo"فيديو";
          //       break;
          //       case '1':
          //       echo"صورة";
          //       break;
          //   default:
          //     // code...
          //     break;
          //   }
          //    echo("</td>");

             ?>








<?php
}
echo("</table>");
}

    else{
echo("Sorry there is no data try again");
}
}
echo ("</div>");?>
</body>
</html>
<?php

include("foteer.php");
}
else
{?>
  <script language="javascript">window.location.href="homepage.php?errorms=1";</script>
<?php
}
?>
