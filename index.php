<?php
$class_name = "index";
$chapter_name = "";
$page_name = "";
?>
<?php $dircheckPath = "not hi"; ?>
<?php include('config/connect.php'); ?>
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


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->

    <script>
    function random_bg_color(){
        var x = Math.floor(Math.random() * 256);
        var y = Math.floor(Math.random() * 256);
        var z = Math.floor(Math.random() * 256);
        var bgColor = "rgb(" + x + "," + y + "," + z + ")";
        return bgColor;
    }

    </script>
		<!-- Main content -->
		<section class="content">

			<div class="row">
        <?php  $query = mysqli_query($conn,"select * from class") or die(mysqli_error());
          while ($row = mysqli_fetch_array($query)) {
            $class_id = $row['class_id'];
              $class_name = $row['class_name'];
      ?>

				<div class="col-md-12 col-lg-4">
<a class="d-block" href="subject?pid=<?php echo $class_id; ?>">
				  <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title d-block text-center"><?php echo $class_name; ?></h3>
					</div>
					<div class="box-body">

            <div id="container_<?php echo $class_id; ?>" class="container">

            </div>
					</div>
					<!-- /.box-body -->
				  </div>
</a>
				  <!-- /.box -->
				</div>
        <script>
                function setup_<?php echo $class_id; ?>(){

                    var container = document.getElementById("container_<?php echo $class_id; ?>");

                    for (var i = 0; i < 1; i++) {
                        var box = document.createElement("div");
                        container.appendChild(box);
                        var colors = random_bg_color();
                        box.style.backgroundColor = colors;
                        box.innerHTML = "<h1 align='center' style='color:black;padding: 70px 0;'><?php echo $class_name; ?></h1>";

                    }
                }
setup_<?php echo $class_id; ?>()
        </script>

<?php } ?>

<?php if(!isset($class_id)){ ?>
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
