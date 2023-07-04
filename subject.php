<?php include('config/connect.php'); ?>
<?php $dircheckPath = "not hi";
$page_name = "";
?>
<?php
$id = filter_var(htmlentities($_GET['pid']), FILTER_SANITIZE_NUMBER_INT);
$_COOKIE["class"] = "$id";
?>
<?php  $query = mysqli_query($conn,"select class_name from class where class_id = '$id'") or die(mysqli_error());
while ($row = mysqli_fetch_array($query)) {
$class_name_x = $row['class_name'];
} ?>
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
<?php include "includes/navhead.php"; ?>
<script>

function random_bg_color(){
    var x = Math.floor(Math.random() * 256);
    var y = Math.floor(Math.random() * 256);
    var z = Math.floor(Math.random() * 256);
    var bgColor = "rgb(" + x + "," + y + "," + z + ")";
    return bgColor;
}

</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">

      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title"><strong><?php echo $class_name_x; ?></strong></h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="index"><?php echo $class_name_x; ?></a></li>
                          </ol>
                      </nav>
                  </div>
              </div>
          </div>
      </div>

		<!-- Main content -->
		<section class="content">

			<div class="row">
        <?php  $query = mysqli_query($conn,"select * from subject where class_id = '$id'") or die(mysqli_error());
          while ($row = mysqli_fetch_array($query)) {
            $subject_id = $row['subject_id'];
              $subject_name = $row['subject_name'];
?>
				<div class="col-md-12 col-lg-4">
<a class="d-block" href="chapter?pid=<?php echo $subject_id; ?>">
				  <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title d-block text-center"><?php echo $subject_name; ?></h3>
					</div>
					<div class="box-body">
            <div id="container_<?php echo $subject_id; ?>" class="container">

            </div>

					</div>
					<!-- /.box-body -->
				  </div>
</a>
				  <!-- /.box -->
				</div>
        <script>
                function setup_<?php echo $subject_id; ?>(){

                    var container = document.getElementById("container_<?php echo $subject_id; ?>");

                    for (var i = 0; i < 1; i++) {
                        var box = document.createElement("div");
                        container.appendChild(box);
                        var colors = random_bg_color();
                        box.style.backgroundColor = colors;
                        box.innerHTML = "<h1 align='center' style='color:black;padding: 70px 0;'><?php echo $subject_name; ?></h1>";

                    }
                }
setup_<?php echo $subject_id; ?>()
        </script>
<?php } ?>

<?php if(!isset($subject_id)){ ?>
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
