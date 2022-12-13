<?php
session_start();
  if(isset( $_SESSION['admin_role'])){
$namepage=array("لوحة التحكم",
"إدارة التصنفيات",
"إضافة تصنيف جديد");
include("header.php");
include("config.php");
include("function.php");
?>
<?php
//insert
        if(isset($_POST['save'])){
//*********************upload  files***********
$expensions = array("jpg","png","jpeg","p");
if(isset($_FILES['data']['name']) && $_FILES['data']['name'] !=""){
  $cat_image = upload_file($_FILES['data'],$expensions,"IMG_","صورة التصنيف");
} else {
  $cat_image = "";
}


              $catname=input_secure($_POST['catname']);

              $typ=input_secure($_POST['type']);
              if(isset($_POST['valid']) && !empty($_POST['valid'])){
              $vaild=1;
            }
              else{
                $vaild=0;
              }

              $insert=mysqli_query($connection,"INSERT INTO categor( catname, catimg, vaild, type) VALUES ('$catname','  $cat_image ','$vaild','$typ')");
              header('location:news.php');
                }
else{
?>
<html>
<head>
  <title>ADD Category page</title>
  <link rel="stylesheet" href="design.css">
</head>
<body>

    <div class="column2">

  <button class="butt">اضافة تصنيف جديد</button>

  <form style="  margin-top: 100px;  margin-right: 100px;" action"addcat.php"   method=POST enctype='multipart/form-data'>

  <label for"catname">اسم التصنيف</label>
  <input type="text"class="in" name="catname" id="catname" placeholder="اسم التصنيف" >
  <br><br>
  <label for"data">صورة</label>
  <input type="file" name="data" id="data" placeholder="اختار الملف" >

    <br><br>

  <label for="type">نوع المحتوى</label>
  <select name="type" id="type">
    <option value="1">صور</option>
    <option value="2">فيدوهات</option>
    <option value="3">مقالات</option>

  </select>
  <br><br>

  <label for "vaild">تفعيل</label>
 <input type="checkbox" checked="checked" name="valid" id ="valid" >

    <br><br>

      <button class="s" name="save" id="save" > حفظ </button>
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
include("foteer.php");
}
else{?>
  <script language="javascript">window.location.href="homepage.php?errorms=1";</script>
<?php
}
?>
