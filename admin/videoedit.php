<?php
session_start();
if(isset( $_SESSION['admin_role'])){
$namepage=array("لوحة التحكم",
"إدارة الفيديو",
"تعديل الفيديو");
include("header.php");
include("config.php");
include("function.php");
$id=$_GET['up'];
$cat=mysqli_query($connection,"SELECT * FROM video where id=$id");
$count=mysqli_num_rows($cat);

if($count==0){
  echo("  <div class='column2'>
  لايوجد مستخدم بهذا الرقم
        </div>  ");
}

while($row=mysqli_fetch_array($cat)){
?>

<html>
<head>
  <title>video page</title>
  <link rel="stylesheet" href="design.css">
</head>
<body>
  <div class="column2">

<form style="  margin-top: 70px;  margin-right: 100px;" action"videoedit.php"   method=POST enctype='multipart/form-data'>

<label for"video_name">اسم الفيديو</label>
<input type="text"class="in" name="video_name" id="video_name" value="<?php echo($row['video_name'])?>" required="required">
<br><br>
<label for"img">الفيديو</label>
<input type="file" name="img" id="img" >
<input type="hidden" name="i" id="i"  value="<?php echo($row['video'])?>" >
<?php
if(!empty($row['video'])){
  ?>
  <br><br>
  <a href= '<?php echo($row['video']);?>' target ="_blank"  >
     <video style="width :29%;">
    <source src='<?php echo($row['video']);?>'>
  <video>
    </a>
 <?php
}
 ?>
  <br><br>

<label for="type">نوع الفيديو</label>
<select name="type" id="type" >
     <?php
     $SQ_img=mysqli_query($connection,"SELECT *FROM categor WHERE type =2");
     while($ro=mysqli_fetch_array($SQ_img)){?>


         <option value="<?php echo($ro['id']);?>"   <?php if($row['type']==$ro['id']){echo 'selected'; }else{ echo " "; }?> >

          <?php echo $ro['catname'];

           ?>

        </option>
<?php
}



     ?>
</select>
<br><br>

<label for "vaild">تفعيل</label>
<input type="checkbox" <?php if($row['vaild']==1){?>checked="checked"<?php } else{}?> name="valid" id ="valid" >

  <br><br>

    <button class="s" name="edit" id="edit" > تحديث </button>
    <button class="s" name="can" id="can" >إلغاء </button>
 <?php
       if(isset($_POST['can'])){
       header('location:video.php');
       }
 ?>

</form>
</div>
</body>
</html>
<?php



}
//updat
if(isset($_POST['edit'])){
$id=input_secure($_GET['up']);
$video_name=input_secure($_POST['video_name']);
$typ=input_secure($_POST['type']);
$expensions = array("mp4","png","jpeg");
if(isset($_FILES['img']['name']) && $_FILES['img']['name'] !=""){
    $cat_img = upload_file($_FILES['data'],$expensions,"video","الفيديو");
     $imga_sql =$cat_img;
} else {

     $imga_sql =input_secure($_POST['i']);
}


if(isset($_POST['valid']) && !empty($_POST['valid'])){
$vaild=1;
}
else{
 $vaild=0;
}

mysqli_query($connection,"UPDATE `video` SET `video_name`='$video_name',`type`='$typ',`video`='$imga_sql ',`vaild`='$vaild' WHERE id=$id;");
header('location:video.php');
}

include("foteer.php");
}
else{?>
  <script language="javascript">window.location.href="homepage.php?errorms=1";</script>
<?php
}
?>
