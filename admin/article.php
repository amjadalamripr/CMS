<?php

session_start();
  if(isset( $_SESSION['admin_role'])){
$namepage=array("لوحة التحكم",
"إدارة المقالات");
include("header.php");
include("config.php");
include("function.php");


?>

<html>
<head>
  <title>Articale page</title>
  <link rel="stylesheet" href="design.css">
</head>
<body>

    <div class="column2">
      <form action="searchar.php" method="POST">
        <input class="se" type="search" name="se" id="se" placeholder="بحث">
          <button class="s"> بحث</button>
        </form>



<form action="articaleadd.php">
  <button class="butt">اضافة مقال جديد</button>



<?php
$cat=mysqli_query($connection,"SELECT  article.*,categor.id as cat_id , categor.catname as CATname FROM article LEFT JOIN categor ON article.type=categor.id;");
echo"<table id='customers'>
  <th>ID</th>
  <th>اسم المقال</th>
  <th>نوع الاشتراك</th>
  <th>التصنيف</th>
  <th>عرض</th>
  <th>تعديل</th>
  <th>حذف</th>";
while($row=mysqli_fetch_array($cat)){
     echo("<tr>");
     echo("<td>".$row['id']."</td>");
     echo("<td>".$row['article_name']."</td>");
      echo("<td>");
     if($row['vaild']==1){

       echo("فعال");
     }
       else
       {
         echo("محظور");
       }
         echo("</td>");

        echo("<td>");

      echo($row['CATname']);

      echo("</td>");

?>


    <html>

   <td><a class="ab" href="articalvi.php?vi=<?php echo $row['id'];?>">عرض المقال </a></td>
   <td><a class="ab" href="articaledit.php?up=<?php echo $row['id'];?>">تعديل</a></td>
    <td><a class="abc" href="article.php?del=<?php echo $row['id'];?>">X</a></td>
  </tr>

  </form>



</html>
<?php
}

echo("</table>");

//delet
 if(isset($_GET['del'])){
   $del=input_secure($_GET['del']);
   mysqli_query($connection,"DELETE FROM article WHERE id=$del");
    header('location:article.php');
 }
?>
<!-- ----------------------- -->

<hr style="
    margin-top: 100px;
">
<ol>
  <h2>الأقسام </h2>
  <?php
  $ca=mysqli_query($connection,"SELECT * FROM `categor` WHERE type=3;");

 while($r=mysqli_fetch_array($ca)){


   echo ("<li class='lis '>");
   ?>
   <a class='ab' href='searchart.php?d=<?php echo $r['id'];?>' > <?php  echo($r['catname']);?> </li></a>

<?php  }?>




</ol>

<!--  -->
    </div>
    <hr>

</body>
</html>
<?php

include("foteer.php");
}
else{?>
  <script language="javascript">window.location.href="homepage.php?errorms=1";</script>
<?php
}
?>
