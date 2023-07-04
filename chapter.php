<?php $id = filter_var(htmlentities($_GET['pid']), FILTER_SANITIZE_NUMBER_INT); ?>
<?php include('config/connect.php'); ?>
<?php  $query = mysqli_query($conn,"select subject_name, class_id from subject where subject_id = '$id'") or die(mysqli_error());
while ($row = mysqli_fetch_array($query)) {
$subject_name = $row['subject_name'];
$class_id = $row['class_id'];
$query = mysqli_query($conn,"select class_name from class where class_id = '$class_id'") or die(mysqli_error());
while ($rowv = mysqli_fetch_array($query)) {
$class_name_x = $rowv['class_name'];
} }
?>
<?php $dircheckPath = "not hi";
$page_name = "";
?>
<?php include "includes/header.php"; ?>
  <body class="hold-transition <?php if(isset($_SESSION['mode'])){echo $_SESSION['mode'];}else{echo "light-skin";} ?> sidebar-mini theme-warning fixed rtl">
  <div class="wrapper">
  <div id="loader"></div>
  <style>
  .container > div {
  width: 100%;
  vertical-align: middle;
  height:200px;
  }
  </style>
  <script>

  function random_bg_color(){
  var x = Math.floor(Math.random() * 256);
  var y = Math.floor(Math.random() * 256);
  var z = Math.floor(Math.random() * 256);
  var bgColor = "rgb(" + x + "," + y + "," + z + ")";
  return bgColor;
  }
  </script>
  <?php include "includes/navhead.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="container-full">
  <!-- Content Header (Page header) -->


  <div class="content-header">
  <div class="d-flex align-items-center">
  <div class="mr-auto">
  <h3 class="page-title"><strong><?php echo $subject_name; ?></strong></h3>
  <div class="d-inline-block align-items-center">
  <nav>
  <ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="index"><?php echo $class_name_x; ?></a></li>
  <li class="breadcrumb-item active" aria-current="page"><a href="subject?pid=<?php echo $class_id; ?>"><?php echo $subject_name; ?></a></li>
  </ol>
  </nav>
  </div>
  </div>
  </div>
  </div>

  <!-- Main content -->
  <section class="content">

  <div class="row">
  <?php
  $query = mysqli_query($conn,"select * from chapter where subject_id = '$id'") or die(mysqli_error());
  while ($row = mysqli_fetch_array($query)) {
  $chapter_id = $row['chapter_id'];
  $chapter_name = $row['chapter_name'];
$location = $row['location'];

$hashtags_url = '/youtu.be\/[a-z1-9.-_]+/';
$chapter_name = preg_replace($hashtags_url, "$2", $chapter_name);
$hashtags_url = '/youtube.com\/[a-z1-9.-_]+/';
$chapter_name = preg_replace($hashtags_url, "$2", $chapter_name);
$hashtags_url = '/(\www.|http|https|ftp|ftps)([x00-\xFF]+[a-zA-Z0-9x00-\xFF_\w\.com]+)/';
$chapter_name = preg_replace($hashtags_url, "$2", $chapter_name);
  ?>

<div class="col-md-12 col-lg-4">
<a class="d-block" <?php if(!preg_match("/.(mp4|ogg|wmb|mp3)$/i", $location)){ ?> href="view?pid=<?php echo $chapter_id; ?>"<?php } ?>>
<div class="box">
<div class="box-header with-border">
<h3 class="box-title d-block text-center"><?php echo $chapter_name; ?></h3>
</div>
<?php
$hashtags_url = '/(\www.|http|https|ftp|ftps)([x00-\xFF]+[a-zA-Z0-9x00-\xFF_\w\.com]+)/';
 ?>
<div class="box-body">
<?php if(preg_match("/.(mp4|ogg|wmb)$/i", $location)){ ?>
  <video loop controls src="<?php echo $location; ?>" style="object-fit:cover;height:200px" class="container">
<?php echo $chapter_name; ?>
  </video>
<?php }elseif(preg_match("/.(png|jpeg|jpg)$/i", $location)){ ?>
  <img src="<?php echo $location; ?>" alt="<?php echo $chapter_name; ?>" style="object-fit:cover;height:200px" class="container">
<?php }elseif(preg_match("/.(mp3)$/i", $location)){ ?>
  <audio loop controls src="<?php echo $location; ?>" style="height:200px" class="container"></audio>
<?php }elseif(preg_match("/youtu.be\/[a-z1-9.-_]+/", $chapter_name) || preg_match("/youtube.com\/[a-z1-9.-_]+/", $chapter_name)){ ?>
  <iframe src="<?php echo $chapter_name; ?>" style="object-fit:cover;height:200px" class="container"><?php echo $chapter_name; ?></iframe>
<?php }elseif(preg_match($hashtags_url, $chapter_name)){ ?>
  <div id="container_<?php echo $chapter_id; ?>" style="height:200px" class="container">
  </div>
<?php }else{ ?>
<div id="container_<?php echo $chapter_id; ?>" style="height:200px" class="container">
</div>
<?php } ?>
</div>

<!-- /.box-body -->
</div>
</a>
<!-- /.box -->
</div>


  <script>
  function setup_<?php echo $chapter_id; ?>(){

  var container = document.getElementById("container_<?php echo $chapter_id; ?>");

  for (var i = 0; i < 1; i++) {
  var box = document.createElement("div");
  container.appendChild(box);
  var colors = random_bg_color();
  box.style.backgroundColor = colors;
  box.innerHTML = "<h1 align='center' style='color:black;padding: 70px 0;'><?php echo $chapter_name; ?></h1>";

  }
  }
  setup_<?php echo $chapter_id; ?>()
  </script>
  <?php } ?>
  <?php if(!isset($chapter_id)){ ?>
  <div class="box">
  <div class="box-header no-border">
  <h4 class="box-title d-block text-center">لا يوجد أي شيء في هده الصفحه في الوقت الحالي</h4>
  </div>
  </div>
  <?php } ?>
  </div>

  </section>
  <!-- /.content -->
  </div>
  </div>
  <!-- /.content-wrapper -->

  <?php include "includes/footer.php"; ?>
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
  <script src="js/vendors.min.js"></script>
  <script src="js/pages/chat-popup.js"></script>
  <script src="assets/icons/feather-icons/feather.min.js"></script>

  <!-- Crypto Tokenizer Admin App -->
  <script src="js/template.js"></script>



  </body>
  </html>
