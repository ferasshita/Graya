<?php include('config/connect.php'); ?>
<?php
$dircheckPath = "not hi";
$page_name = "";
?>
<?php include "includes/header.php"; ?>

<body class="hold-transition <?php if(isset($_SESSION['mode'])){echo $_SESSION['mode'];}else{echo "light-skin";} ?> sidebar-mini theme-warning fixed rtl">
<div class="wrapper">
<div id="loader"></div>

<?php include "includes/navhead.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h4 class="page-title">حول</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="about">حول</a></li>
							</ol>
						</nav>
					</div>
				</div>

			</div>
		</div>

		<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="box">

            <div class="box-body">
              هدا الموقع يهدف الى اتاحه اجابه عن اسئله المنهج الليبي بطريقه سهله ومجانيه
            </div>
            <!-- /.box-body -->

            <!-- /.box-footer-->
          </div>
        </div>
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
