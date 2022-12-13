<?php

session_start();
  if(isset( $_SESSION['admin_role'])){
$namepage=array("لوحة التحكم",
"إدارة الفيديو");
include("header.php");
include("config.php");
include("function.php");


?>

<html>
<head>
  <title>Videos page</title>
  <link rel="stylesheet" href="design.css">
</head>
<body>

    <div class="column2">
      <form action="videosearch.php" method="POST">
        <input class="se" type="search" name="se" id="se" placeholder="بحث">
          <button class="s"> بحث</button>
      </form>


<form action="videoadd.php">
  <button class="butt">اضافة فيديو جديد</button>



<?php
$cat=mysqli_query($connection,"SELECT  video.*,categor.id as cat_id , categor.catname as CATname FROM video LEFT JOIN categor ON video.type=categor.id;");
echo"<table id='customers'>
  <th>ID</th>
  <th>اسم الفيديو</th>
  <th>نوع الاشتراك</th>
  <th>التصنيف</th>
  <th>تعديل</th>
  <th>حذف</th>";
while($row=mysqli_fetch_array($cat)){
     echo("<tr>");
     echo("<td>".$row['id']."</td>");
     echo("<td>".$row['video_name']."</td>");
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

   <td><a class="ab" href="videoedit.php?up=<?php echo $row['id'];?>">تعديل</a></td>
    <td><a class="abc" href="video.php?del=<?php echo $row['id'];?>">X</a></td>
  </tr>

  </form>



</html>
<?php
}

echo("</table>");

//delet
 if(isset($_GET['del'])){
   $del=input_secure($_GET['del']);
   mysqli_query($connection,"DELETE FROM video WHERE id=$del");
    header('location:video.php');
 }


?>


    </div>

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
