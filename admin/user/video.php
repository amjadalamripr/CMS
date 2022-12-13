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


<form action="videoadd.php">




<?php
$cat=mysqli_query($connection,"SELECT  video.*,categor.id as cat_id , categor.catname as CATname FROM video LEFT JOIN categor ON video.type=categor.id;");

while($ro=mysqli_fetch_array($cat)){

echo("<br><br>");
echo($ro['video_name']);
echo("<br><br>");
?>
<a href= '<?php echo("https://amjadwebsite2022.online/admin/".$ro['video']);?>' target ="_blank"  >
   <video style="width :29%;">
  <source src='<?php echo("https://amjadwebsite2022.online/admin/".$ro['video']);?>'>
<video>
  </a>
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
