<?php
if(!isset($_SESSION)) { session_start(); }
include("config.php");
include("function.php");

  if(!isset($_SESSION['admin_role'] )){
  if(isset($_POST['user'])&&isset($_POST['pass'])){
    $user=input_secure($_POST['user']);
    $pass=input_secure($_POST['pass']);
    $ecrp_pass=sha1(md5($pass));
    $sql=mysqli_query($connection,"SELECT * FROM `student` WHERE username='$user' and password='$ecrp_pass' and vaild='1'");



                $user_num=mysqli_num_rows($sql);
                if($user_num>0){
                while ($row=mysqli_fetch_array($sql)) {
                 $_SESSION['admin_role']=$row['name'];}
                  if($user=="admin"){
                    ?>
                    <script language="javascript">window.location.href="dashboard.php";</script>


           <?php
    }

    else{
      ?>
      <script language="javascript">window.location.href="user/dashboardus.php";</script>
<?php

    }
                }

                else{?>
                  <script language="javascript">window.location.href="homepage.php?errorms=1";</script>


                <?php
              }
}
            else{?>
                  <script language="javascript">window.location.href="homepage.php?errorms=1";</script>
<?php
}

  }



else{

$namepage=array("لوحة التحكم");
include("header.php");
// $user=input_secure($_POST['user']);
// $sql=mysqli_query($connection,"SELECT * FROM student WHERE username='$user'");
// while ($row=mysqli_fetch_array($sql)) {
// ?>
<div class="column2">

  <?php echo("  <h3'style=color:black;'>   أهلاً ". $_SESSION['admin_role']. " </h3>");
  ?>
  <p>تُسعدنا زيارتك لموقع تأهيل تك والذي يتميزبعرض أهم المقالات والصور والفيدوهات الحديثة في عالم البرمجة نتمنى لك  رحلة سعيدة في موقعنا
  والتعلم أكثر </p>

  <h2>لا تنتظر كثير وابدأ رحلتك يا رهيب </h2>
</div>


  <?php

include("foteer.php");
}
//injection for code
//1'OR'x'='x
?>
