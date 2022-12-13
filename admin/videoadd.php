<?php
session_start();
  if(isset( $_SESSION['admin_role'])){
$namepage=array("لوحة التحكم",
"إدارة الفيديو",
"إضافة فيديو جديد");
include("header.php");
include("config.php");
include("function.php");





?>

<?php
//insert
        if(isset($_POST['save'])){
          if(isset($_POST['save'])){
            $expensions = array("mp4","png","jpeg","p");
            if(isset($_FILES['data']['name']) && $_FILES['data']['name'] !=""){
              $cat_image = upload_file($_FILES['data'],$expensions,"video_"," الفيديو");
            } else {
              $cat_image = "";
            }
              $video_name=input_secure($_POST['video_name']);
              $typ=input_secure($_POST['type']);
              if(isset($_POST['valid']) && !empty($_POST['valid'])){
              $vaild=1;
            }
              else{
                $vaild=0;
              }

              $insert=mysqli_query($connection,"INSERT INTO video( video_name, video, vaild, type) VALUES ('$video_name','$cat_image','$vaild','$typ')");
              header('location:video.php');
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

  <button class="butt">اضافة فيديو جديد</button>

  <form style="  margin-top: 100px;  margin-right: 100px;" action"videoadd.php"   method=POST enctype='multipart/form-data'>

  <label for"video_name">اسم الفيديو</label>
  <input type="text"class="in" name="video_name" id="video_name" placeholder="اسم االفيديو" >
  <br><br>
  <label for"data">الفيديو</label>
  <input type="file" name="data" id="data" >

    <br><br>

  <label for="type">نوع المحتوى</label>
  <select name="type" id="type">
    <?php


    $SQ_img=mysqli_query($connection,"SELECT  *FROM categor WHERE type =2 ");
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
         header('location:video.php');
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
