
<?php
include("config.php");
include("mail.php");


if(isset($_POST['sub1'])){
$id=$_GET['v'];
$ve1=$_POST['ver'];
$ver=mysqli_query($connection,"SELECT code FROM student where id=$id");
while($row=mysqli_fetch_array($ver)){
  $ve2=$row['code'];

if($ve1==$ve2){
  ?>
   <script language="javascript">window.location.href="forgetpass.php?v=<?php echo ($id);?>"</script>

   <?php


}


else{
  echo("<div class='d1'>الرمز غير صالح حاول مرة أخرى</div>");

}
}}
?>
<html>
 <head>
   <title>Forgetpass page</title>
     <link rel="stylesheet" href="design.css">
 </head>
 <body>
      <div class="d1">

 <form action="" method=POST>
<h1 style="color:black;">إدخال رمز التحقق</h1>

 <input type="text" name="ver" id="ver" placeholder="أدخل رمز التحقق المرسل">
     <br><br>


     <br><br>
       <input type="submit" class="s" name="sub1" id="sub1" value=" تحقق ">
 </form>

</div>
</body>
 </html>