<?php

session_start();
  if(isset( $_SESSION['admin_role'])){
$namepage=array("لوحة التحكم",
"إدارة الصور");
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

    <div class="column2">
      <form action="searchphpotos.php" method="POST">
        <input class="se" type="search" name="se" id="se" placeholder="بحث">
          <button class="s"> بحث</button>
      </form>


<form action="photoadd.php">




<?php
$cat=mysqli_query($connection,"SELECT  photo.*,categor.id as cat_id , categor.catname as CATname FROM photo LEFT JOIN categor ON photo.type=categor.id;");

while($ro=mysqli_fetch_array($cat)){

echo("<br><br>");
echo($ro['photo_name']);
echo("<br><br>");
?>
<a href='<?php echo("https://amjadwebsite2022.online/admin/".$ro['photo_img']);?>'> <img style="width: 200px;height: 200px; margin-right:10px;" src='<?php echo ("https://amjadwebsite2022.online/admin/".$ro['photo_img']);?>'   alt='<?php echo($ro['photo_name']);?> '></a>
  </form>



</html>
<?php
}


//delet


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
