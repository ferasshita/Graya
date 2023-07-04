<?php
$class_name = "index";
$chapter_name = "";
$page_name = "admin";
$dircheckPath = "hi";
?>
<?php include('../config/connect.php');
if(!isset($_SESSION['id'])){
 header("location:../index");
}
?>
<?php include "../includes/header.php"; ?>
<body class="hold-transition <?php if(isset($_SESSION['mode'])){echo $_SESSION['mode'];}else{echo "light-skin";} ?> sidebar-mini theme-warning fixed ltr">
  <script src="js/jquery.js" type="text/javascript"></script>
      <script src="js/bootstrap.js" type="text/javascript"></script>
<div class="wrapper">
<div id="loader"></div>
<style>
.container > div {
width: 100%;
vertical-align: middle;
height:200px;
}
</style>

<?php include "../includes/navhead.php";?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<section class="content">
<!--======================================[content start]============================-->
<br>
<br>
<div class="row">
<form method="post" action="">
<button type="submit" name="send" class="btn btn-primary">Check the folder</button>
</form>
<?php
if(isset($_POST['send'])){
//==================[get class]==================
$path = "../uploads/serv";
  $entry = scandir($path);
  $entry = array_diff(scandir($path), array('.','..'));
  foreach ($entry as $entry) {
  $query = mysqli_query($conn,"select * from class where class_name = '$entry'");
  while ($row = mysqli_fetch_array($query)) {
    $class_name_c = $row['class_name'];
      $class_id_c = $row['class_id'];
}
if(!empty($class_id_c)){
$posty_ser = $class_id_c;
}else{
  $posty_ser = rand()+time();
}
if(empty($class_name_c)){
  mysqli_query($conn,"insert into class (class_id,class_name) values ('$posty_ser','$entry')");
}
//=====================[get subject]=====================================
$path = "../uploads/serv/$entry";
$files = scandir($path);
$files = array_diff(scandir($path), array('.','..'));
foreach ($files as $files) {
  $query = mysqli_query($conn,"select * from subject where subject_name = '$files'");
  while ($row = mysqli_fetch_array($query)) {
    $subject_name = $row['subject_name'];
      $subject_id = $row['subject_id'];
}
if(!empty($subject_id)){
$posty_ser_s = $subject_id;
}else{
  $posty_ser_s = rand()+time();
}
if(empty($subject_name)){
  mysqli_query($conn,"insert into subject (subject_id,subject_name,class_id) values ('$posty_ser_s','$files','$posty_ser')") or die(mysqli_error());
}
//=======================[get chapter]===============================
  $path = "../uploads/serv/$entry/$files";
  $files_x = scandir($path);
  $files_x = array_diff(scandir($path), array('.','..'));
  foreach ($files_x as $files_x) {
$files_x = "uploads/serv/$entry/$files/$files_x";
    $query = mysqli_query($conn,"select * from chapter where chapter_name = '$files_x'");
    while ($row = mysqli_fetch_array($query)) {
      $chapter_name = $row['chapter_name'];
        $chapter_id = $row['chapter_id'];
  }
  if(!empty($subject_id)){
  $posty_ser_c = $subject_id;
  }else{
    $posty_ser_c = rand()+time();
  }
  if(empty($chapter_name)){
    mysqli_query($conn,"insert into chapter (chapter_id,chapter_name,subject_id,location,class_id) values ('$posty_ser_c','$chapter_name','$posty_ser_s','$files_x','$posty_ser')");  }
  }

}
}
echo "<p id='login_wait' style='margin: 0px;'>Done..</p>";
}
 ?>
          </div>

<!--======================================[content end]============================-->

</section>
<!-- /.content -->
</div>
</div>
<!-- /.content-wrapper -->

<?php include "../includes/footer.php"; ?>
<!-- Control Sidebar -->


<!-- /.control-sidebar -->

<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- ./side demo panel -->

<!-- Sidebar -->

<!-- Page Content overlay -->


<!-- Vendor JS -->
<script src="../js/vendors.min.js"></script>
<script src="../js/pages/chat-popup.js"></script>
<script src="../assets/icons/feather-icons/feather.min.js"></script>

<!-- Crypto Tokenizer Admin App -->
<script src="../js/template.js"></script>



</body>
</html>
