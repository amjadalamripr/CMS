<?php
session_start();
if(isset( $_SESSION['admin_role'])){
$namepage=array("لوحة التحكم",
"إدارة المقالات",
"تعديل المقال");
include("header.php");
include("config.php");
include("function.php");
$id=$_GET['up'];
$cat=mysqli_query($connection,"SELECT * FROM article where id=$id");
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
  <title>Edit article page</title>
  <link rel="stylesheet" href="design.css">
</head>
<body>
  <div class="column2">

<form style="  margin-top: 70px;  margin-right: 100px;" action"article.php"   method=POST enctype='multipart/form-data'>

<label for"article_name">اسم التصنيف</label>
<input type="text"class="in" name="article_name" id="article_name" value="<?php echo($row['article_name'])?>" required="required">
<br><br>
<label for"data">المقال</label>
<input type="file" name="data" id="data" >
<input type="hidden" name="i" id="i"  value="<?php echo($row['article_img'])?>" >
<?php
if(!empty($row['article_img'])){
  ?>
  <br><br>
  <a href= '<?php echo($row['article_img']);?>' target ="_blank"  >   <img class="im" src=  '<?php echo($row['article_img']); ?>' >   </a>
 <?php
}
 ?>

  <br><br>
  <textarea name="Text1" cols="40" rows="5"   ><?php echo ($row['tex']);?></textarea>

  <br><BR>
    <label for="day">تاريخ الإضافة :</label>
<input type="date" id="day" name="day" value='<?php echo ($row['dateadd']);?>'>
    <br><br>
<label for="type">نوع التصنيف</label>
<select name="type" id="type" >
     <?php
     $SQ_img=mysqli_query($connection,"SELECT *FROM categor WHERE type =3");
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
         ?>
         <script language="javascript">window.location.href="article.php";</script>

      <?php
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
$article_name=input_secure($_POST['article_name']);
$typ=input_secure($_POST['type']);

$tex=input_secure($_POST['Text1']);
 $date=input_secure($_POST['day']);
$expensions = array("gif","jpg","jpeg","pjpeg","pdf");
if(isset($_FILES['data']['name']) && $_FILES['data']['name'] !=""){
      $pfiledir = upload_file($_FILES['data'],$expensions,"articles","Image Title");
      $cat_image=$pfiledir;
} else {
      $cat_image =input_secure($_POST['i']);;
}


if(isset($_POST['valid']) && !empty($_POST['valid'])){
$vaild=1;
}
else{
 $vaild=0;
}

mysqli_query($connection,"UPDATE `article` SET `article_name`='$article_name',`article_img`='$cat_image',`vaild`='$vaild',`type`='$typ',`dateadd`='$date',`tex`='$tex' WHERE id=$id;");
?>
<script language="javascript">window.location.href="article.php";</script>

<?php
}

include("foteer.php");
}
else{?>
  <script language="javascript">window.location.href="homepage.php?errorms=1";</script>
<?php
}
?>
