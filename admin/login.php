  <?php
  if(isset($_POST['user'])&&isset($_POST['pass'])){
    $user=input_secure($_POST['user']);
    $pass=input_secure($_POST['pass']);
    $ecrp_pass=sha1(md5($pass));
    $query = "SELECT * FROM `student`  WHERE `username`=`$user` and `password`=`$ecrp_pass`and `vaild`=1";
    $sql=mysqli_query($connection,$query);



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
?>