
<?php
/*************************** Upload Files ***************************/
// upload files
$expensions = array("gif","jpg","jpeg","pjpeg","bmp","png","doc", "docx","ppt","pptx","xls","xlsx","zip","rar","pdf");
if(isset($_FILES['data']['name']) && $_FILES['data']['name'] !=""){
      $pfiledir = upload_file($_FILES['data'],$expensions,"articles","Image Title");
} else {
      $pfiledir = "";
}

// Start of file upload funtion for PHP5
function upload_file($file_data,$expensions,$pre_char,$file_label)
{
    global $uploadpath;
    global $enable_aws_uploads;
    global $bucketname;

      $file_path            = "";
      $error_msg_extention  = "";
      $error_msg_size       = "";
      $errors               = array();
      if(isset($file_data)) {
      $file_ext  = strtolower(end(explode('.',$file_data['name'])));
      $file_name = $pre_char."_".time()."_".rand(1, 100).".".$file_ext;
      $file_size = $file_data['size'];
      $file_tmp  = $file_data['tmp_name'];
      $file_type = $file_data['type'];
      if(isset($file_ext) && in_array($file_ext,$expensions)=== false){
         $errors[]            = "الملف المرفق ليس من أنواع الملفات المسموح بها";
         $error_msg_extention = "خطأ في تحميل : " . $file_label ." - الملف المرفق ليس من أنواع الملفات المسموح بها";
         echo "<script>alert('". $error_msg_extention ."');</script>";
      }

      if($file_size > 10097152){
         $errors[]       = "الحد الأقصى لحجم الملف للتحميل هو 10 ميجا فقط";
         $error_msg_size = "خطأ في تحميل : " . $file_label ." - الحد الأقصى لحجم الملف للتحميل هو 10 ميجا فقط";
         echo "<script>alert('". $error_msg_size ."');</script>";
      }

      if(empty($errors)==true){
         move_uploaded_file($file_tmp,$uploadpath."uploads/".$file_name);
         $file_path = $uploadpath."uploads/".$file_name;
         if($enable_aws_uploads == true) {
            aws_upload($file_name,"uploads", $bucketname);
         }
         return $file_path;
      }
      } else {
         $file_path = "";
         return $file_path;
      }
}
// End of file upload funtion for PHP5
?>

<?php
/*************************** Send E-mail ***************************/
// Start of send e-mail function //
function send_mail_message($address, $comments) {

    // Start of send variable //
    $sitenamemal = $organization_name;
    $contemail = $contemail;
    $frm_e_subject = "لديك رسالة من";
    $frm_e_subject_snd_to = "مرسلة إلى";
    $frm_e_subject_snd_bdy = "وفيما يلي نص الرسالة : ";
    $frm_can_contact = "يمكنك التواصل مع";
    $frm_can_contact_mail = "من خلال البريد الإلكتروني :";
    // Start of send variable //

    $comments = $comments;
    $address = $address;

    $name = $sitenamemal;
    $email = $contemail;
    $subject = $frm_e_subject ." ". $name ;

    $e_body = "$frm_e_subject $name , $frm_e_subject_snd_bdy " . PHP_EOL . PHP_EOL;
    $e_content = "\"$comments\"" . PHP_EOL . PHP_EOL;
    $e_reply = "$frm_can_contact $name $frm_can_contact_mail  $email ";

    $msg = wordwrap( $e_body . $e_content . $e_reply, 70 );

    $headers = "From: $email" . PHP_EOL;
    $headers .= "Reply-To: $email" . PHP_EOL;
    $headers .= "MIME-Version: 1.0" . PHP_EOL;
    $headers .= "Content-type: text/html; charset=utf-8" . PHP_EOL;
    $headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

    mail($address, $subject, $msg, $headers);

    }
    // End of send e-mail function //
?>

<?php
/*************************** Sessions ***************************/
if(!isset($_SESSION)) { session_start(); }   // Iin first Line

// register sessions
$_SESSION['admin_role'] = 'admin';

// destroy sessions
unset($_SESSION['adminid']);

// check session or redirect page //
if (!isset($_SESSION['adminid']))
{
?>
<script language="javascript">window.location.href="index.php";</script>
<?php
}
?>

<?php
/*************************** Time Format ***************************/

//  start time configuration //
$m = date("m",time()+28800);
$y = date("Y",time()+28800);
$d = date("d",time()+28800);
$tim= date("h:i",time()+28800);
$dd=date("D",time()+28800);
$pdate= date("F j, Y, g:i a",time()+28800);
$okbublshdate = date("F j, Y, g:i a",time()+28800);
$gdate= date("F j, Y, g:i a",time()+28800);
// start time configuration //

$appfrmdate= date("d-m-Y");
$srtpdate = strtotime($appfrmdate);

?>

<?php
/*************************** Database MySQL ***************************/
// DB Connection
$db_host ="localhost";
$db_user ="root";
$db_pass ="";
$db_name ="1000dev";

//$sql_insert_ignore = " IGNORE";
//$sql_update_ignore = " IGNORE";
$sql_insert_ignore = "";
$sql_update_ignore = "";


// error_reporting(E_ALL ^ E_NOTICE);      // stop error
// error_reporting(E_ALL ^ E_DEPRECATED);
$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
mysqli_query($connection,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");



// Select Queries
$sqtstmnt = "SELECT * from articles ORDER BY ID DESC";
$result = mysqli_query($connection,$sqtstmnt);
$pages = mysqli_num_rows($result);

while ($row=mysqli_fetch_array($read)) {
   echo $row['ID'];
}

// Add Row
mysqli_query($connection,"insert ". $sql_insert_ignore ." applicationfrm set patientsid='".$patientsid."',memname='". $patresv['memname'] ."'");

// Update Row
mysqli_query($connection,"update ". $sql_update_ignore ." applicationfrm set patientsid='".$patientsid."',memname='". $patresv['memname'] ."' where ID='". $ids ."'");

// Delete Row
mysqli_query($connection,"DELETE FROM applicationfrm WHERE ID='1'");

?>
