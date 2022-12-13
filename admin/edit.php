<?php
session_start();
if(isset( $_SESSION['admin_role'])){
$namepage=array("لوحة التحكم",
"إدارة التصنيفات",
"تعديل التصنيف");
include("header.php");
include("config.php");
include("function.php");
$id=$_GET['up'];
$cat=mysqli_query($connection,"SELECT * FROM categor where id=$id");
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
  <title>Edit Articale page</title>
  <link rel="stylesheet" href="design.css">
</head>
<body>
  <div class="column2">

<form style="  margin-top: 70px;  margin-right: 100px;" action"edit.php"   method=POST enctype='multipart/form-data'>

<label for"catname">اسم الصور</label>
<input type="text"class="in" name="catname" id="catname" value="<?php echo($row['catname'])?>" required="required">
<br><br>
<label for"data">صورة</label>

<input type="file" name="data" id="data" >
<input type="hidden" name="i" id="i"  value="<?php echo($row['catimg'])?>" >
<?php
if(!empty($row['catimg'])){
  ?>
  <br><br>
  <a name="da" id="da" href= '<?php echo($row['catimg']);?>' target ="_blank"  >  <img  class="im" src='<?php echo($row['catimg']);?>'> </a>
 <?php
}
 ?>
  <br><br>

<label for="type">نوع المحتوى</label>
<select name="type" id="type" placeholder="">
  <option value= "  <?php echo($row['type'])?>">
     <?php
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
           echo"قيمة غير صالحة";
         break;
     }
     ?>
  </option>
  <option value="1">صور</option>
  <option value="2">فيدوهات</option>
  <option value="3">مقالات</option>

</select>
<br><br>

<label for "vaild">تفعيل</label>
<input type="checkbox" <?php if($row['vaild']==1){?>checked="checked"<?php } else{}?> name="valid" id ="valid" >

  <br><br>

    <button class="s" name="edit" id="edit" > تحديث </button>
    <button class="s" name="can" id="can" >إلغاء </button>
 <?php
       if(isset($_POST['can'])){
       header('location:news.php');
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
$catname=input_secure($_POST['catname']);

$expensions = array("jpg","png","jpeg");
if(isset($_FILES['data']['name']) && $_FILES['data']['name'] !=""){
    $cat_img = upload_file($_FILES['data'],$expensions,"cat_","صورة التصنيف");
     $imga_sql =$cat_img;
} else {

     $imga_sql =input_secure($_POST['i']);
}
$typ=input_secure($_POST['type']);
if(isset($_POST['valid']) && !empty($_POST['valid'])){
$vaild=1;
}
else{
 $vaild=0;
}

mysqli_query($connection,"UPDATE categor SET catname='$catname',catimg='$imga_sql',vaild='$vaild',type='$typ' WHERE id=$id");
header('location:news.php');
}

include("foteer.php");
}
else{?>
  <script language="javascript">window.location.href="homepage.php?errorms=1";</script>
<?php

}
?>
