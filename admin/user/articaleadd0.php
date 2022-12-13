<?php
session_start();
  if(isset( $_SESSION['admin_role'])){
$namepage=array("لوحة التحكم",
"إدارة المقالات",
"إضافة مقال جديد");
include("header0.php");
include("config.php");
include("function.php");





?>

<?php
//insert
        if(isset($_POST['save'])){
          $expensions = array("jpg","png","jpeg","p");
          if(isset($_FILES['data']['name']) && $_FILES['data']['name'] !=""){
            $cat_image = upload_file($_FILES['data'],$expensions,"IMG_","صورة التصنيف");
          } else {
            $cat_image = "";
          }
             $tex=input_secure($_POST['Text1']);
              $date=input_secure($_POST['day']);
              $article_name=input_secure($_POST['article_name']);
              $typ=input_secure($_POST['type']);
              if(isset($_POST['valid']) && !empty($_POST['valid'])){
              $vaild=1;
            }
              else{
                $vaild=0;
              }

              $insert=mysqli_query($connection,"INSERT INTO article( article_name, article_img	, vaild, type,dateadd,tex) VALUES ('$article_name','$cat_image','$vaild','$typ','$date','$tex')");
              header('location:article0.php');
                }




    else{
?>
<html>
<head>
  <title>ADD Articale page</title>
  <link rel="stylesheet" href="design.css">
</head>
<body>

    <div class="column2">

  <button class="butt">اضافة مقال جديد</button>

  <form style="  margin-top: 100px;  margin-right: 100px;" action"articleadd.php"   method=POST enctype='multipart/form-data'>

  <label for"article_name">اسم المقال</label>
  <input type="text"class="in" name="article_name" id="article_name" placeholder="اسم المقال" >
  <br><br>
  <label for"data">المقال</label>
  <input type="file" name="data" id="data" >

    <br><br>
    <textarea name="Text1" cols="40" rows="5" placeholder="أبدا بالكتابة هنا........."></textarea>

    <br><BR>
      <label for="day">تاريخ الإضافة :</label>
<input type="date" id="day" name="day">
      <br><br>
  <label for="type">نوع المحتوى</label>
  <select name="type" id="type">
    <?php


    $SQ_img=mysqli_query($connection,"SELECT  *FROM categor WHERE type =3 ");
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
         header('location:article0.php');
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
  <script language="javascript">window.location.href="homepageuser.php?errorm=1";</script>
<?php
}
?>
