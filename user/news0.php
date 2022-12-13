<?php

session_start();
  if(isset( $_SESSION['admin_role'])){
$namepage=array("لوحة التحكم",
"إدارة التصنفيات");
include("header0.php");
include("config.php");
include("function.php");


?>

<html>
<head>
  <title>Articale page</title>
  <link rel="stylesheet" href="design.css">
</head>
<body>

    <div class="column2" style="  overflow-y: scroll;">
      <form action="searchcat.php" method="POST">
        <input class="se" type="search" name="se" id="se" placeholder="بحث">
          <button class="s"> بحث</button>
      </form>
<form action="addcat.php">

<?php
$cat=mysqli_query($connection,"SELECT * FROM categor");
echo"<table id='customers'>
  <th>الاسم</th>
  <th>الصورة</th>
  <th>نوع الاشتراك</th>
  <th>نوع المحتوى</th>
";
while($row=mysqli_fetch_array($cat)){
     echo("<tr>");
     echo("<td>".$row['catname']."</td>");
     echo("<td>".$row['catimg']."</td>") ;
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
    switch ($row['type']) {
          case '1':
          echo"صورة";
          break;
          case '2':
          echo"فيديو";
          break;
          case '3':
          echo"مقال";
          break;
      default:
        // code...
        break;
    }
?>

    <html>


  </form>



</html>
<?php
}
echo("</table>");
//delet
 if(isset($_GET['del'])){
   $del=input_secure($_GET['del']);
   mysqli_query($connection,"DELETE FROM categor WHERE id=$del");
    header('location:news.php');
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
