<?php
session_start();
  if(isset( $_SESSION['admin_role'])){
$namepage=array("لوحة التحكم",
"إدارة الصور",
"إضافة صورة جديدة");
include("header.php");
include("config.php");
include("function.php");





?>

<?php
//insert
        if(isset($_POST['save'])){
          if(isset($_POST['save'])){
            $expensions = array("jpg","png","jpeg","p");
            if(isset($_FILES['data']['name']) && $_FILES['data']['name'] !=""){
              $cat_image = upload_file($_FILES['data'],$expensions,"IMG_","صورة التصنيف");
            } else {
              $cat_image = "";
            }
              $photo_name=input_secure($_POST['photo_name']);
              $typ=input_secure($_POST['type']);
              if(isset($_POST['valid']) && !empty($_POST['valid'])){
              $vaild=1;
            }
              else{
                $vaild=0;
              }

              $insert=mysqli_query($connection,"INSERT INTO photo( photo_name, photo_img	, vaild, type) VALUES ('$photo_name','$cat_image','$vaild','$typ')");
              header('location:photo.php');
            }}




    else{
?>
<html>
<head>
  <title>ADD Articale page</title>
  <link rel="stylesheet" href="design.css">
</head>
<body>

    <div class="column2">

  <button class="butt">اضافة صورة جديدة</button>

  <form style="  margin-top: 100px;  margin-right: 100px;" action"photoadd.php"   method=POST enctype='multipart/form-data'>

  <label for"photo_name">اسم الصورة</label>
  <input type="text"class="in" name="photo_name" id="photo_name" placeholder="اسم الصورة" >
  <br><br>
  <label for"data">صورة</label>
  <input type="file" name="data" id="data" >

    <br><br>

  <label for="type">نوع المحتوى</label>
  <select name="type" id="type">
    <?php


    $SQ_img=mysqli_query($connection,"SELECT  *FROM categor WHERE type =1 ");
  while($ro=mysqli_fetch_array($SQ_img)){
      ?>
        <option value="<?php echo($ro['id']);?>" >
         <?php echo $ro['catname'];?>

       </option>
<?php
}
    ?>

  </select>
  <br><br>

  <label for "vaild">تفعيل</label>
 <input type="checkbox" checked="checked" name="valid" id ="valid" >

    <br><br>

      <button class="s" name="save" id="save" > حفظ </button>
      <button class="s" name="can" id="can" >إلغاء </button>
   <?php
         if(isset($_POST['can'])){
         header('location:photo.php');
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
